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
    public partial class MedicineManagement : Form
    {
        private DataAccess Da { get; set; }
        internal AdminPanel adminPanel { get; set; }
        internal EmployeePanel employeePanel { get; set; }

        internal string whoAmI { get; set; }
        public MedicineManagement()
        {
            InitializeComponent();
            this.Da = new DataAccess();

        }
        public MedicineManagement(AdminPanel adminPanel)
        {
            InitializeComponent();
            this.Da = new DataAccess();
            this.adminPanel = adminPanel;

        }
        public MedicineManagement(EmployeePanel employeePanel,string whoAmI)
        {
            InitializeComponent();
            this.Da = new DataAccess();
            this.employeePanel = employeePanel;
            this.whoAmI = whoAmI;


        }

        private string GenId()
        {
            string genAutoId = "M-";
            var ds = this.Da.ExecuteQueryTable("select * from MedicineManagement where MedicineId Like 'M-%';");
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
        private void PopulateGridView(string sql = "select * from MedicineManagement;")
        {
            var ds = this.Da.ExecuteQuery(sql);



            this.dgvMedicineManagement.AutoGenerateColumns = false;
            this.dgvMedicineManagement.DataSource = ds.Tables[0];
        }



        private void label2_Click(object sender, EventArgs e)
        {

        }

        private void btnShowInfo_Click(object sender, EventArgs e)
        {
            this.PopulateGridView();
        }
        private bool IsValidToSaveData()
        {
            if (String.IsNullOrEmpty(this.txtMedicineId.Text) || String.IsNullOrEmpty(this.txtMedicineName.Text) ||
                String.IsNullOrEmpty(this.txtMedicineQuantity.Text) || String.IsNullOrEmpty(this.txtMedicinePricePerUnit.Text) ||
                String.IsNullOrEmpty(this.dtpMedicineExpireDate.Text) || String.IsNullOrEmpty(this.dtpMedicineManufacturingDate.Text))
            {
                return false;
            }
            else
                return true;
        }
        private void RefreshContent()
        {
            this.txtMedicineId.Text = this.GenId();
            //this.txtMedicineId.Clear();
            this.txtMedicineName.Clear();
            this.txtMedicineQuantity.Clear();
            this.txtMedicinePricePerUnit.Clear();
            this.dtpMedicineManufacturingDate.Text = "";
            this.dtpMedicineExpireDate.Text = "";

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

                var query = "select * from MedicineManagement where MedicineId = '" + this.txtMedicineId.Text + "';";
                var ds = this.Da.ExecuteQuery(query);

                if (ds.Tables[0].Rows.Count == 1)
                {
                    //update
                    var sql = @"update MedicineManagement
                                set MedicineName =' " + this.txtMedicineName.Text + @"', 
                                MedicineQuantity = " + this.txtMedicineQuantity.Text + @",
                             MedicinePricePerUnit= " + this.txtMedicinePricePerUnit.Text + @",
                                MedicineManufacturingDate = '" + this.dtpMedicineManufacturingDate.Text + @"',
                                 MedicineExpireDate ='" +this.dtpMedicineExpireDate.Text +@"'
                                where MedicineId = '" + this.txtMedicineId.Text + "';";
                    int count = this.Da.ExecuteDMLQuery(sql);

                    if (count == 1)
                        MessageBox.Show("Data updated successfully");
                    else
                        MessageBox.Show("Data upgradation failed");
                }
                else
                {
                    //insert
                    var sql = @"insert into MedicineManagement values('" + this.txtMedicineId.Text + "','" + this.txtMedicineName.Text + "'," + this.txtMedicineQuantity.Text + ",'" + this.txtMedicinePricePerUnit.Text + "','" + this.dtpMedicineManufacturingDate.Text + "' , '" + this.dtpMedicineExpireDate.Text + "');";
                    int count = this.Da.ExecuteDMLQuery(sql);

                    if (count == 1)
                        MessageBox.Show("Data insertion successfull");
                    else
                        MessageBox.Show("Data insertion failed");
                }
                this.PopulateGridView();
                this.RefreshContent();
                this.txtMedicineId.Text = this.GenId();
            }
            catch (Exception exc)
            {
                MessageBox.Show("An error has occured: " + exc.Message);
            }
        }

        private void btnRemove_Click(object sender, EventArgs e)
        {
            try
            {
                var id = this.dgvMedicineManagement.CurrentRow.Cells[0].Value.ToString();
                var name = this.dgvMedicineManagement.CurrentRow.Cells[1].Value.ToString();

                var sql = "delete from MedicineManagement where MedicineId = '" + id + "';";
                int count = this.Da.ExecuteDMLQuery(sql);

                if (count == 1)
                    MessageBox.Show(name + " has been deleted successfully");
                else
                    MessageBox.Show("Data deletion failed");

                this.PopulateGridView();
                this.txtMedicineId.Text = this.GenId();
            }
            catch (Exception exc)
            {
                MessageBox.Show("An error has occured: " + exc.Message);
            }
        }

        private void btnClear_Click(object sender, EventArgs e)
        {
            this.RefreshContent();
        }
        private bool IsValidToSaveData1()
        {
            if (String.IsNullOrEmpty(this.txtMedicineId.Text) || String.IsNullOrEmpty(this.txtMedicineName.Text) ||
                String.IsNullOrEmpty(this.txtMedicineQuantity.Text) || String.IsNullOrEmpty(this.txtMedicinePricePerUnit.Text) ||
                String.IsNullOrEmpty(this.dtpMedicineExpireDate.Text) || String.IsNullOrEmpty(this.dtpMedicineManufacturingDate.Text))
            {
                return false;
            }
            else
                return true;
        }

      
        private void btnSearch_Click(object sender, EventArgs e)
        {

        }

        private void txtSearchByName_TextChanged(object sender, EventArgs e)
        {
            var sql = "select * from MedicineManagement where MedicineName like '%" + this.txtSearchByName.Text + "%'or MedicineId like '%" + this.txtSearchByName.Text + "%' ;";// or Id like '"+this.txtMovieId.Text+"%';";
            this.PopulateGridView(sql);
        }

        private void dgvMedicineManagement_DoubleClick(object sender, EventArgs e)
        {
            this.txtMedicineId.Text = this.dgvMedicineManagement.CurrentRow.Cells["MedicineId"].Value.ToString();
            this.txtMedicineName.Text = this.dgvMedicineManagement.CurrentRow.Cells["MedicineName"].Value.ToString();
            this.txtMedicineQuantity.Text = this.dgvMedicineManagement.CurrentRow.Cells["MedicineQuantity"].Value.ToString();
            this.txtMedicinePricePerUnit.Text = this.dgvMedicineManagement.CurrentRow.Cells["MedicinePricePerUnit"].Value.ToString();
            this.dtpMedicineManufacturingDate.Text = this.dgvMedicineManagement.CurrentRow.Cells["MedicineManufacturingDate"].Value.ToString();
            this.dtpMedicineExpireDate.Text = this.dgvMedicineManagement.CurrentRow.Cells["MedicineExpireDate"].Value.ToString();
        }

        private void btnHomePage_Click(object sender, EventArgs e)
        {
            if(whoAmI == "Employee")
            {
                employeePanel.Show();
                this.whoAmI = null;
            }else
            {
                adminPanel.Show();
            }
            this.Hide();
        }

        private void MedicineManagement_FormClosing(object sender, FormClosingEventArgs e)
        {
            this.Hide();
            Environment.Exit(1);
        }

        private void MedicineManagement_Load(object sender, EventArgs e)
        {
            this.txtMedicineId.Text = this.GenId();
        }
    }
}
    
