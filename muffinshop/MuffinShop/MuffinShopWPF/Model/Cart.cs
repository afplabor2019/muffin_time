using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MuffinShopWPF.Model
{
    class Cart
    {
        private ICollection<CartItem> cart;

        public ICollection<CartItem> GetCart()
        {
            ICollection<CartItem> copyCart = new List<CartItem>();

            if (cart.Count > 0)
            {
                foreach (CartItem item in cart)
                {
                    copyCart.Add(item);
                }   
            }

            return copyCart;
        }

        public void AddItemToCart(CartItem item)
        {
            if (item != null)
            {
                cart.Add(item);
            }
        }

        public void RemoveItemFromCart(CartItem item)
        {
            if (item != null && cart.Contains(item))
            {
                cart.Remove(item);
            }
        }

        public void ModifyQty(CartItem item, byte qty)
        {
            if (item != null && cart.Contains(item))
            {
                var modifyItem = cart.Where(p => p.Product == item.Product).First();
                modifyItem.Quantity += qty;
            }
        }

        public Cart()
        {

        }
    }
}
