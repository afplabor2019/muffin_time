using MuffinShopWPF.BusinessLogic;
using MuffinShopWPF.BusinessLogic.Exceptions;
using MuffinShopWPF.Command;
using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Input;

namespace MuffinShopWPF.ViewModel
{
    public class RegisterPageViewModel : ObservableObject
    {

        private string _UserName;
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
        private string _userPassword;
        [Required(ErrorMessage = "Jelszó kötelező!")]
        public string UserPassword
        {
            get { return _userPassword; }
            set
            {
                _userPassword = value;
                ValidateProperty("UserPassword", value);
            }
        }
        private string _retryPassword;
        [Required(ErrorMessage = "Kérem erősítse meg jelszavát!")]
        public string RetryPassword
        {
            get { return _retryPassword; }
            set
            {
                _retryPassword = value;
                ValidateProperty("RetryPassword", value);
            }
        }

        private string _email;
        [Required(ErrorMessage = "Kérem adja meg email címét!")]
        public string Email
        {
            get { return _email; }
            set
            {
                _email = value;
                ValidateProperty("Email", value);
            }
        }
        private ICommand _doRegistration;
        public ICommand DoRegistration
        {
            get
            {
                if (_doRegistration == null)
                {
                    _doRegistration = new RelayCommand(p => true, p => RegisterUser(UserName, UserPassword, RetryPassword, Email));
                }
                return _doRegistration;
            }
        }
        public void RegisterUser(string username, string password, string RetryPassword, string email)
        {
            Validate();
            if (IsValid)
            {
                try
                {
                    Registration.RegisterUser(username, password, RetryPassword, email);
                    MessageBox.Show("Sikeres regisztráció!");
                }
                catch (UsernameExistsException)
                {
                    MessageBox.Show("Ez a felhasználó már létezik!");
                }
                catch (EmailExistsException)
                {
                    MessageBox.Show("Ezzel az email címmel már regisztráltak!");
                }
                catch (PasswordsNotMatchException)
                {
                    MessageBox.Show("A két jelszónak meg kell egyeznie!");
                }
            }
        }
    }
}