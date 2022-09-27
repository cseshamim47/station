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
    public partial class FormMember : Form
    {
        private FormLogin Fl { get; set; }

        public FormMember()
        {
            InitializeComponent();
        }
        
        public FormMember(FormLogin fl, string info) : this()
        {
            this.Fl = fl;
            this.lblInfo.Text += info;
        }

        private void btnLogout_Click(object sender, EventArgs e)
        {
            this.Hide();
            MessageBox.Show("Logout Complete");
            this.Fl.Show();
        }

        private void FormMember_FormClosed(object sender, FormClosedEventArgs e)
        {
            this.Hide();
            MessageBox.Show("Logout Complete");
            this.Fl.Show();
        }
    }
}
