using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Collections.ObjectModel;

namespace MuffinShopWPF.Model
{
    class MuffinModelCS
    {
        public int muffin_id { get; set; }
        public string muffin_name { get; set; }
        public Nullable<decimal> muffin_price { get; set; }
    }
}
