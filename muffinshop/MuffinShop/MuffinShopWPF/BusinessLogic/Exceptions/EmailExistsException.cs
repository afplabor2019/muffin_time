using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MuffinShopWPF.BusinessLogic.Exceptions
{
    class EmailExistsException : Exception
    {
        public EmailExistsException()
        {
        }

        public EmailExistsException(string message)
            : base(message)
        {
        }

        public EmailExistsException(string message, Exception inner)
            : base(message, inner)
        {
        }
    }
}
