using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MuffinShopWPF.BusinessLogic.Exceptions
{
    class PasswordsNotMatchException : Exception
    {
        public PasswordsNotMatchException()
        {
        }
        public PasswordsNotMatchException(string message)
            :base(message)
        {
        }
        public PasswordsNotMatchException(string message, Exception inner)
            : base(message, inner)
        {
        }
    }
}
