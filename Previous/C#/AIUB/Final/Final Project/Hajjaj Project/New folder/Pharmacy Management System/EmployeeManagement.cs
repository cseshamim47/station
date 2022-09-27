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
    public partial class EmployeeManagement : Form
    {
        //private object txtEmployeeName;

        private DataAccess Da { get; set; }
        internal AdminPanel adminPanel { get; set; }
        public EmployeeManagement()
        {
            InitializeComponent();
            this.Da = new DataAccess();
            
           
        }
        
        public EmployeeManagement(AdminPanel adminPanel)
        {
            InitializeComponent();
            this.Da = new DataAccess();
            this.adminPanel = adminPanel;
            
        }

        private string GenId()
        {
            string genAutoId = "E-";
            var ds = this.Da.ExecuteQueryTable("select * from UserInfo where UserId Like 'E-%';");
            int increment = 1;
            if (ds.Rows.Count != 0)
            {
                increment = Int32.Parse(ds.Rows[ds.Rows.Count - 1][0].ToString().Substring(2)) + 1;
                genAutoId += increment.ToString("D3");
            }
            else
            {
                genAutoId += increment.ToString("D3");
            }
            return genAutoId;
        }

        private void PopulateGridView(string sql = "select * from UserInfo where UserId Like 'E-%';")
        {
            var ds = this.Da.ExecuteQuery(sql);



            this.dgvEmployeeManagement.AutoGenerateColumns = false;
            this.dgvEmployeeManagement.DataSource = ds.Tables[0];
        }

        private void btnShowInfo_Click(object sender, EventArgs e)
        {
             this.PopulateGridView();
        }


        

        private void dgvEmployeeManagement_DoubleClick(object sender, EventArgs e)
        {
            this.txtEmployeeId.Text = this.dgvEmployeeManagement.CurrentRow.Cells[0].Value.ToString();
            this.txtEmpName.Text = this.dgvEmployeeManagement.CurrentRow.Cells[1].Value.ToString();
            this.txtEmployeeSalary.Text = this.dgvEmployeeManagement.CurrentRow.Cells[2].Value.ToString();
            this.txtPhoneNumber.Text = this.dgvEmployeeManagement.CurrentRow.Cells[3].Value.ToString();
            string date = this.dgvEmployeeManagement.CurrentRow.Cells["JoiningDate"].Value.ToString();
            this.dtpJoiningDate.Text = date;

        }

        private void btnRemove_Click(object sender, EventArgs e)
        {
            try
            {
                var id = this.dgvEmployeeManagement.CurrentRow.Cells[0].Value.ToString();
                var name = this.dgvEmployeeManagement.CurrentRow.Cells[1].Value.ToString();

                var sql = "delete from UserInfo where UserId = '" + id + "';";
                int count = this.Da.ExecuteDMLQuery(sql);

                if (count == 1)
                    MessageBox.Show(name + " has been deleted successfully");
                else
                    MessageBox.Show("Data deletion failed");

                this.PopulateGridView();
                this.txtEmployeeId.Text = this.GenId();
                this.RefreshContent();
            }
            catch (Exception exc)
            {
                MessageBox.Show("An error has occured: " + exc.Message);
            }
        }
        private void RefreshContent()
        {
            
            this.txtEmpName.Clear();
            this.txtEmployeeSalary.Clear();
            this.txtPhoneNumber.Clear();
            this.dtpJoiningDate.Text="";
              
        }

        private void btnClear_Click(object sender, EventArgs e)
        {
            this.txtEmployeeId.Text = this.GenId();
            this.RefreshContent();
        }
        private bool IsValidToSaveData()
        {
            if (String.IsNullOrEmpty(this.txtEmployeeId.Text) || String.IsNullOrEmpty(this.txtEmpName.Text) ||
                String.IsNullOrEmpty(this.txtEmployeeSalary.Text) || String.IsNullOrEmpty(this.txtPhoneNumber.Text) ||
                String.IsNullOrEmpty(this.dtpJoiningDate.Text))
            {
                return false;
            }
            else
                return true;
        }

        private void btnSave_Click(object sender, EventArgs e)
        {
            try
            {
                if (!this.IsValidToSaveData())
                {
                    MessageBox.Show("Invalid opration. Please fill up all the information");
                    return;
                }

                var query = "select * from UserInfo where UserId = '" + this.txtEmployeeId.Text + "';";
                var ds = this.Da.ExecuteQuery(query);

                if (ds.Tables[0].Rows.Count == 1)
                {
                    //update
                    var sql = @"update UserInfo
                                set UserName =' " + this.txtEmpName.Text + @"', 
                                UserSalary = " + this.txtEmployeeSalary.Text + @",
                             UserPhoneNumber = '" + this.txtPhoneNumber.Text + @"',
                                JoiningDate = '" + this.dtpJoiningDate.Text + @"'
                                where UserId = '" + this.txtEmployeeId.Text + "';";
                    int count = this.Da.ExecuteDMLQuery(sql);

                    if (count == 1)
                        MessageBox.Show("Data updated successfully");
                    else
                        MessageBox.Show("Data upgradation failed");

                    
                }
                else
                {
                    //insert
                    var sql = "insert into UserInfo values('"+this.txtEmployeeId.Text+"','"+this.txtEmpName.Text+"','NULL','"+this.txtPhoneNumber.Text+"','Dhaka','"+this.dtpJoiningDate.Text+"','"+this.txtEmployeeSalary.Text+"','123');";
                    int count = this.Da.ExecuteDMLQuery(sql);

                    if (count == 1)
                        MessageBox.Show("Data insertion successfull");
                    else
                        MessageBox.Show("Data insertion failed");
                }

                this.txtEmployeeId.Text = this.GenId();
                this.PopulateGridView();
                this.RefreshContent();
            }
            catch (Exception exc)
            {
                MessageBox.Show("An error has occured: " + exc.Message);
            }
        }

        private void btnHomePage_Click(object sender, EventArgs e)
        {
            adminPanel.Show();
            this.Hide();
        }

        private void EmployeeManagement_FormClosing(object sender, FormClosingEventArgs e)
        {
            this.Hide();
            Environment.Exit(1);
        }

        private void EmployeeManagement_Load(object sender, EventArgs e)
        {
            this.txtEmployeeId.Text = GenId();
        }
    }
}
