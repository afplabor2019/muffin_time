using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MuffinShopWPF.BusinessLogic
{
    public static class EventAggregator
    {
        public static void Broadcast(string message)
        {
            if(OnMessageTransmitted != null)
            {
                OnMessageTransmitted(message);
            }
        }

        public static Action<string> OnMessageTransmitted;
    }
}
