using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using MuffinShopWPF.Command;
using MuffinShopWPF.View;
using MuffinShopWPF.Model;
using MuffinShopWPF.UI;
using MuffinShopWPF.BusinessLogic;

namespace MuffinShopWPF.ViewModel
{
    class MainWindowViewModel : ObservableObject
    {
        public MainWindowViewModel()
        {
            EventAggregator.OnMessageTransmitted += OnMessageReceived;
        }

        private void OnMessageReceived(string message)
        {
            if (message == "Muffin changed") NotifyPropertyChanged("AllMuffins");
            if (message == "Muffin updated") NotifyPropertyChanged("AllMuffins");
        }
        public int UserId
        {
            get { return UIRepository.Instance.CurrentClientID; }
        }

        private ICollection<MuffinModelCS> _AllMuffins;
        public ICollection<MuffinModelCS> AllMuffins
        {
            get
            {
                using(var context = new MuffinContext())
                {
                    _AllMuffins = MuffinMapper.EntityCollectionToModelCollection(context.Muffin.OrderByDescending(m => m.muffin_id).ToList());
                }

                return _AllMuffins;
            }
        }
    }
}
