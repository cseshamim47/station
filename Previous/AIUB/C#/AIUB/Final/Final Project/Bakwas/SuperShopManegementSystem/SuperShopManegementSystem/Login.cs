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
    public partial class Login : Form
    {
        private DataAccess Da { get; set; }
        public Login()
        {
            InitializeComponent();
            this.Da = new DataAccess();
        }

        private void btnLogin_Click(object sender, EventArgs e)
        {
            //this.panelRight.Focus();
            if (this.txtLoginId.Text.Length == 0 || this.txtLoginPassword.Text.Length == 0)
            {
                MessageBox.Show("Please enter all information!", "", MessageBoxButtons.OK, MessageBoxIcon.Question);
                return;
            }
            string query = "select * from UserInfo where UserName = '" + this.txtLoginId.Text + "' and Password = '" + this.txtLoginPassword.Text + "';";
            var ds = this.Da.ExecuteQuery(query);
            if (ds.Tables[0].Rows.Count == 1) MessageBox.Show("logged in");
            else MessageBox.Show("Your credential is wrong!", "Failed", MessageBoxButtons.OK, MessageBoxIcon.Exclamation);
        }
        
        private void KeyPress(object sender, KeyEventArgs e)
        {
            if (e.KeyCode == Keys.Enter)
            {
                e.Handled = e.SuppressKeyPress = true;
                btnLogin_Click(this, new EventArgs());

            }
            else if (e.KeyCode == Keys.Escape)
            {
                e.Handled = e.SuppressKeyPress = true;
                btnClear_Click(this, new EventArgs());
            }
        }

        private void txtLoginId_KeyDown(object sender, KeyEventArgs e)
        {
            KeyPress(sender, e);
        }

        private void txtLoginPassword_KeyDown(object sender, KeyEventArgs e)
        {
            KeyPress(sender, e);
        }

        private void Login_FormClosing(object sender, FormClosingEventArgs e)
        {
            Environment.Exit(1);
        }

        private void btnClear_Click(object sender, EventArgs e)
        {
            this.txtLoginId.Clear();
            this.txtLoginPassword.Clear();
            //this.panelRight.Focus();
        }
    }
}
