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
    public partial class LoginScreen : Form
    {
        private DataAccess Da { get; set; }
        private AdminPanel adminPanel { get; set; }
        public LoginScreen()
        {
            InitializeComponent();
            this.Da = new DataAccess();
        }

            

        private void LoginScreen_FormClosing(object sender, FormClosingEventArgs e)
        {
            this.Hide();
            Environment.Exit(1);
        }

        private void button1_Click(object sender, EventArgs e)
        {
            if (this.txtId.Text.Length == 0 || this.txtPassword.Text.Length == 0)
            {
                MessageBox.Show("Please enter all information!", "", MessageBoxButtons.OK, MessageBoxIcon.Question);
                return;
            }

            string query = "select * from UserInfo where UserId = '" + this.txtId.Text + "' and UserPassword = '" + this.txtPassword.Text + "';";
            var ds = this.Da.ExecuteQuery(query);

            if (ds.Tables[0].Rows.Count == 1)
            {
                if (this.txtId.Text[0] == 'E')
                {
                    EmployeePanel employeePanel = new EmployeePanel(this.txtId.Text, this);
                    employeePanel.Show();
                    this.Hide();
                }
                else 
                {
                    if (adminPanel == null)
                    {
                        adminPanel = new AdminPanel(this.txtId.Text, this);
                    }else
                    {
                        adminPanel.Id = this.txtId.Text;
                    }
                    adminPanel.txtCurrentUser.Text = this.txtId.Text;
                    adminPanel.Show();
                    this.Hide();
                }
                
                
            }
            else MessageBox.Show("Your credential is wrong!", "Failed", MessageBoxButtons.OK, MessageBoxIcon.Exclamation);
        }

        private void button2_Click(object sender, EventArgs e)
        {
            this.txtId.Clear();
            this.txtPassword.Clear();
        }
    }
}
