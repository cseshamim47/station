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

    public partial class AdminProfile : Form
    {
        private DataAccess Da { get; set; }
        internal string Id { get; set; }
        internal AdminPanel AdminPanel { get; set; }
        public AdminProfile()
        {
            InitializeComponent();
            this.Da = new DataAccess();
        }

        public AdminProfile(string id, AdminPanel adminPanel)
        {
            InitializeComponent();
            this.Da = new DataAccess();
            this.AdminPanel = adminPanel;
            this.Id = id;
        }

        private void btnLogOut_Click(object sender, EventArgs e)
        {
            this.AdminPanel.Show();
            this.Hide();
        }

        private void AdminProfile_FormClosing(object sender, FormClosingEventArgs e)
        {
            this.Hide();
            Environment.Exit(1);
        }

        private void AdminProfile_Load(object sender, EventArgs e)
        {
            string query = "select * from UserInfo where UserId = '" + this.Id + "';";

            var ds = this.Da.ExecuteQueryTable(query);

            this.txtUserId.Text = ds.Rows[0][0].ToString();
            this.txtUserName.Text = ds.Rows[0][1].ToString();
            this.txtUserPassword.Text = ds.Rows[0][7].ToString();
            this.txtEmail.Text = ds.Rows[0][2].ToString();
            this.txtPhone.Text = ds.Rows[0][3].ToString();

        }

        private void btnSave_Click(object sender, EventArgs e)
        {
            string query = "Update UserInfo set UserName = '"+this.txtUserName.Text+"', UserPhoneNumber = '"+this.txtPhone.Text+"', UserEmail = '"+this.txtEmail.Text+"', UserPassword = '"+this.txtUserPassword.Text+"' where UserId = '"+this.Id+"'; ";
            var rowCount = this.Da.ExecuteDMLQuery(query);
            if (rowCount == 1)
            {
                MessageBox.Show("Data updated successfully");
            }
            else
                MessageBox.Show("Data upgradation failed");
        }
    }
}
