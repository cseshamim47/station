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
    public partial class EmployeeProfile : Form
    {
        internal EmployeePanel employeePanel { get; set; }
        internal string Id { get; set; }
        private DataAccess Da { get; set; }
        public EmployeeProfile()
        {
            InitializeComponent();
            this.Da = new DataAccess();
        }
        
        public EmployeeProfile(EmployeePanel employeePanel, string id)
        {
            InitializeComponent();
            this.employeePanel = employeePanel;
            this.Id = id;
            this.Da = new DataAccess();
        }

        private void EmployeeProfile_FormClosing(object sender, FormClosingEventArgs e)
        {
            this.Hide();
            Environment.Exit(1);
        }

        private void btnGoBack_Click(object sender, EventArgs e)
        {
            employeePanel.Show();
            this.Hide();
        }

        private void EmployeeProfile_Load(object sender, EventArgs e)
        {
            string query = "select * from UserInfo where UserId = '" + this.Id + "';";

            var ds = this.Da.ExecuteQueryTable(query);

            this.txtUserId.Text = ds.Rows[0][0].ToString();
            this.txtUserName.Text = ds.Rows[0][1].ToString();
            this.txtUserPassword.Text = ds.Rows[0][7].ToString();
        }

        private void btnUpdate_Click(object sender, EventArgs e)
        {
            string query = "Update UserInfo set UserName = '" + this.txtUserName.Text + "',UserPassword = '" + this.txtUserPassword.Text + "' where UserId = '" + this.Id + "'; ";
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
