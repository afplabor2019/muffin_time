using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using MuffinShopWPF.BusinessLogic.Exceptions;
using MuffinShopWPF.Model;

namespace MuffinShopWPF.BusinessLogic
{
    public static class Registration
    {
        public static bool hasUsername(string username)
        {
            using(var context = new MuffinContext())
            {
                var hasUser = context.User.Any(u => u.username.ToLower() == username.ToLower());
                return hasUser;
            }
        }

        public static void RegisterUser(string username, string password, string repassword, string email)
        {
            using (var context = new MuffinContext())
            {
                if (hasUsername(username))
                    throw new UsernameExistsException();
                if(password == repassword)
                {
                    User newUser = new User();
                    newUser.username = username;
                    newUser.password = password;
                    newUser.email = email;
                    context.User.Add(newUser);
                    context.SaveChanges();
                }
                else
                {
                    throw new PasswordsNotMatchException();
                }
            }
        }
    }
}
