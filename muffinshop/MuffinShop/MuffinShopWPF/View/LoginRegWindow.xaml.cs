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

namespace MuffinShopWPF.View
{
    /// <summary>
    /// Interaction logic for LoginRegWindow.xaml
    /// </summary>
    public partial class LoginRegWindow : Window
    {
        public LoginRegWindow()
        {
            InitializeComponent();
            Main.Content = new LoginPage();
        }

        private void Login_Click(object sender, RoutedEventArgs e)
        {
            LoginPage loginPage = new LoginPage();
            Main.Content = loginPage;
        }

        private void Signup_Click(object sender, RoutedEventArgs e)
        {
            RegisterPage registerPage = new RegisterPage();
            Main.Content = registerPage;
        }
    }
}
