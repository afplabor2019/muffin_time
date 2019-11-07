using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using MuffinShopWPF.Model;

namespace MuffinShopWPF.BusinessLogic
{
    public static class MuffinActions
    {
        public static void AddMuffin(string muffin_name, decimal muffin_price)
        {
            using(var context = new MuffinContext())
            {
                Muffin newMuffin = new Muffin();
                newMuffin.muffin_name = muffin_name;
                newMuffin.muffin_price = muffin_price;
                context.Muffin.Add(newMuffin);
                context.SaveChanges();
            }
        }

        public static void ModifyMuffin(int muffin_id, string muffin_name, decimal muffin_price)
        {
            using(var context = new MuffinContext())
            {
                Muffin modifyMuffin = context.Muffin.Find(muffin_id);
                modifyMuffin.muffin_name = muffin_name;
                modifyMuffin.muffin_price = muffin_price;
                context.Entry(modifyMuffin).State = System.Data.Entity.EntityState.Modified;
                context.SaveChanges();
            }
        }

        public static void DeleteMuffin(int id)
        {
            using(var context = new MuffinContext())
            {
                Muffin deleteMuffin = context.Muffin.Find(id);
                context.Muffin.Remove(deleteMuffin);
                context.SaveChanges();
            }
        }
    }
}
