using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MuffinShopWPF.Model
{
    public class UserModelCS
    {
        public int user_id { get; set; }
        public string username { get; set; }
        public string password { get; set; }
        public string email { get; set; }
        public string zip_code { get; set; }
        public string city { get; set; }
        public string address { get; set; }
        public string phone { get; set; }
    }
}
