using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Pharmacy_Management_System
{
    public partial class Splash : Form
    {
        public Splash()
        {
            InitializeComponent();
        }
        
        private void Splash_Load(object sender, EventArgs e)
        {

            timer1.Start();
        }

        private void timer1_Tick(object sender, EventArgs e)
        {
            this.pnlGreen.Width += 4;

            if (this.pnlGreen.Width > 195)
            {
                this.timer1.Stop();
                LoginScreen loginScreen = new LoginScreen();
                loginScreen.Show();
                this.Hide();
            }
        }
    }
}
