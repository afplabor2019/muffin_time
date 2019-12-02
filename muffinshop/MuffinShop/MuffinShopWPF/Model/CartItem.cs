using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MuffinShopWPF.Model
{
    class CartItem
    {
        private Muffin product;

        public Muffin Product
        {
            get { return product; }
            set { product = value; }
        }

        private byte quantity;

        public byte Quantity
        {
            get { return quantity; }
            set { quantity = value; }
        }

        private int price;

        public int Price
        {
            get { return this.Product.muffin_price; }
            set { price = value; }
        }

    }
}
