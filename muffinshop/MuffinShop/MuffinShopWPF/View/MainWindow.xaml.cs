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
using MuffinShopWPF.UI;

namespace MuffinShopWPF.View
{
    /// <summary>
    /// Interaction logic for OneProduct.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        public MainWindow()
        {
            InitializeComponent();
        }

        private void ListViewMenu_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            int index = ListViewMenu.SelectedIndex;
            MoveCursorMenu(index);
            switch (index)
            {
                case 0:
                    GridPrincipal.Children.Clear();
                    GridPrincipal.Children.Add(new UserControlCakes());
                    break;
                case 1:
                    GridPrincipal.Children.Clear();
                    GridPrincipal.Children.Add(new UserControlChoose());
                    break;
                default:
                    break;
            }
        }

        private void MoveCursorMenu(int index)
        {
            TrainsitionigContentSlide.OnApplyTemplate();
            GridCursor.Margin = new Thickness(0, (100+ (60* index)), 0, 0);
        }

        private void Btn_Basket_Click(object sender, RoutedEventArgs e)
        {
            Cart cart = new Cart();
            cart.Show();
        }

        private void Btn_Account_Click(object sender, RoutedEventArgs e)
        {
            if(UIRepository.Instance.CurrentClientID == 0)
            {
                LoginRegWindow loginRegWindow = new LoginRegWindow();
                loginRegWindow.Show();
            }
            else
            {
                MessageBox.Show(UIRepository.Instance.LoggedInUser.username);
            }
        }
    }
}
