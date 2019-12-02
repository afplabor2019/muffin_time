using MuffinShopWPF.BusinessLogic;
using MuffinShopWPF.BusinessLogic.Exceptions;
using MuffinShopWPF.Command;
using MuffinShopWPF.View;
using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Input;

namespace MuffinShopWPF.ViewModel
{
    class LoginPageViewModel : ObservableObject
    {
        string _UserName;
        [Required(ErrorMessage = "Felhasználónév kötelező!")]
        public string UserName
        {
            get { return _UserName; }
            set
            {
                _UserName = value;
                ValidateProperty("UserName", value);
            }
        }
        string _Password;
        [Required(ErrorMessage = "Jelszó kötelező!")]
        public string Password
        {
            get { return _Password; }
            set
            {
                _Password = value;
                ValidateProperty("Password", value);
            }
        }

        public void UserLogin(string username, string password)
        {
            try
            {
                if (LoginLogout.UserLogin(username, password))
                {
                    LoggedInBrowseWindow loggedInBrowseWindow = new LoggedInBrowseWindow();
                    loggedInBrowseWindow.Show();
                }
            }
            catch (UserNotFoundException)
            {
                MessageBox.Show("Ilyen felhasználó nem létezik!");
            }
            catch (IncorrectPasswordException)
            {
                MessageBox.Show("Helytelen jelszó!");
            }
        }

        private ICommand _Login;
        public ICommand Login
        {
            get
            {
                if (_Login == null)
                {
                    _Login = new RelayCommand(p => true, p => this.UserLogin(UserName, Password));
                }
                return _Login;
            }
        }

        public LoginPageViewModel()
        {

        }
    }
}
