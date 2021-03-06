﻿using MuffinShopWPF.Model;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MuffinShopWPF.UI
{
    class UIRepository
    {
        private static volatile UIRepository instance;
        private static object syncRoot = new object();

        private UIRepository() { }

        public static UIRepository Instance
        {
            get
            {
                if(instance == null)
                {
                    lock (syncRoot)
                    {
                        if (instance == null)
                            instance = new UIRepository();
                    }
                }

                return instance;
            }
        }

        private int _currentClientID;
        public int CurrentClientID
        {
            get { return _currentClientID; }
            set { _currentClientID = value; }
        }

        private User loggedInUser;

        public User LoggedInUser
        {
            get { return loggedInUser; }
            set { loggedInUser = value; }
        }

        private Cart userCart;
        public Cart UserCart
        {
            get { return userCart; }
            set { userCart = value; }
        }

    }
}
