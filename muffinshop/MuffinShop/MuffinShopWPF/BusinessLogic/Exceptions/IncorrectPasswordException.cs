using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MuffinShopWPF.BusinessLogic.Exceptions
{
    class IncorrectPasswordException : Exception
    {
        public IncorrectPasswordException()
        {
        }

        public IncorrectPasswordException(string message)
            : base(message)
        {
        }

        public IncorrectPasswordException(string message, Exception inner)
            : base(message, inner)
        {
        }
    }
}
