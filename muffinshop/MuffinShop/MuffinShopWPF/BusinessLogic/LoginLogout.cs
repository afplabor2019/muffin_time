using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using MuffinShopWPF.Model;
using MuffinShopWPF.BusinessLogic.Exceptions;
using MuffinShopWPF.UI;

namespace MuffinShopWPF.BusinessLogic
{
    class LoginLogout
    {
        public static bool UserLogin(string username, string password)
        {
            using (var context = new MuffinContext())
            {
                var issetUser = context.User.Any(user => user.username.ToLower() == username);
                if (!issetUser)
                    throw new UserNotFoundException();
                else
                {
                    var user = context.User.Where(u => u.username.ToLower() == username.ToLower()).First();
                    if (user.password != password)
                        throw new IncorrectPasswordException();
                    else
                    {
                        UIRepository.Instance.CurrentClientID = user.user_id;
                        UIRepository.Instance.LoggedInUser = user;
                        return true;
                    }
                }
            }
        }

        public static void UserLogout()
        {
            UIRepository.Instance.CurrentClientID = 0;
        }
    }
}
