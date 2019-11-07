using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MuffinShopWPF.BusinessLogic.Exceptions
{
    class UsernameExistsException : Exception
    {
        public UsernameExistsException()
        {   
        }

        public UsernameExistsException(string message)
            :base(message)
        {
        }

        public UsernameExistsException(string message, Exception inner)
            : base(message, inner)
        {
        }
    }
}
