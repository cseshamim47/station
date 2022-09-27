using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace SuperShopManegementSystem
{
    public partial class Loading : Form
    {
        public Loading()
        {
            InitializeComponent();
        }

        private void timer1_Tick(object sender, EventArgs e)
        {
            this.pnlLoading.Width += 7;
            if(this.pnlLoading.Width >= 650)
            {
                this.timer1.Stop();
                Login login = new Login();
                this.Hide();
                login.Show();
            }
        }
        private void Loading_Load(object sender, EventArgs e)
        {
            timer1.Start();
        }

    }
}
