using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MuffinShopWPF.Model
{
    static class MuffinMapper
    {
        public static MuffinModelCS EntityToModel(Muffin muffin)
        {
            MuffinModelCS muffinModel = new MuffinModelCS();
            muffinModel.muffin_id = muffin.muffin_id;
            muffinModel.muffin_name = muffin.muffin_name;
            muffinModel.muffin_price = muffin.muffin_price;

            return muffinModel;
        }

        public static Muffin ModelToEntity(MuffinModelCS muffinModel)
        {
            Muffin muffin = new Muffin();
            muffin.muffin_id = muffinModel.muffin_id;
            muffin.muffin_name = muffinModel.muffin_name;
            muffin.muffin_price = muffinModel.muffin_price;

            return muffin;
        }

        public static ICollection<MuffinModelCS> EntityCollectionToModelCollection(ICollection<Muffin> muffins)
        {
            List<MuffinModelCS> collection = new List<MuffinModelCS>();
            foreach(Muffin muffin in muffins)
            {
                collection.Add(EntityToModel(muffin));
            }

            return collection;
        }

        public static ICollection<Muffin> ModelToEntityCollection(ICollection<MuffinModelCS> muffins)
        {
            List<Muffin> collection = new List<Muffin>();
            foreach (MuffinModelCS muffin in muffins)
            {
                collection.Add(ModelToEntity(muffin));
            }

            return collection;
        }
    }
}
