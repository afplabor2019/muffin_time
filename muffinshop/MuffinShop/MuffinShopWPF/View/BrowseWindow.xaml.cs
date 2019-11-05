using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;
using MuffinShopWPF.Model;
using System.Data.Entity;

namespace MuffinShopWPF.View
{
    /// <summary>
    /// Interaction logic for BrowseWindow.xaml
    /// </summary>
    public partial class BrowseWindow : Window
    {
        MuffinContext context = new MuffinContext();
        CollectionViewSource muffinViewSource;

        public BrowseWindow()
        {
            InitializeComponent();
            muffinViewSource = ((CollectionViewSource)(FindResource("muffinsViewSource")));
            DataContext = this;
        }

        private void Window_Loaded(object sender, RoutedEventArgs e)
        {

            context.muffins.Load();
            muffinViewSource.Source = context.muffins.Local;
        }
    }
}
