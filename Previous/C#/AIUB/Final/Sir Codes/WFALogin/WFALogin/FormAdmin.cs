using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace WFALogin
{
    public partial class FormAdmin : Form
    {
        private FormLogin Fl { get; set; }

        public FormAdmin()
        {
            InitializeComponent();
        }
        
        public FormAdmin(FormLogin fl, string info) : this()
        {
            //InitializeComponent();
            this.Fl = fl;
            this.lblInfo.Text += info;
        }

        private void btnLogout_Click(object sender, EventArgs e)
        {
            this.Hide();
            MessageBox.Show("Logout Complete");
            this.Fl.Show();
        }

        private void FormAdmin_FormClosed(object sender, FormClosedEventArgs e)
        {
            MessageBox.Show("Closing App");
            Application.Exit();
        }
    }
}
