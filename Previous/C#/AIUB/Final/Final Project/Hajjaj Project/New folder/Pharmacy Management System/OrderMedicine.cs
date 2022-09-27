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
    public partial class OrderMedicine : Form
    {
 
        private DataAccess Da { get; set; }
        internal string Id { get; set; }
        public EmployeePanel employeePanel { get; set; }
        public OrderMedicine()
        {
            InitializeComponent();
            this.Da = new DataAccess();
            this.PopulateGridView();
        }
        
        public OrderMedicine(EmployeePanel employeePanel, string id)
        {
            InitializeComponent();
            this.Da = new DataAccess();
            this.PopulateGridView();
            this.employeePanel = employeePanel;
            this.Id = id;
        }
        private void PopulateGridView(string sql = "select * from MedicineManagement;")
        {
            var ds = this.Da.ExecuteQuery(sql);



            this.dgvMedicineManagement.AutoGenerateColumns = false;
            this.dgvMedicineManagement.DataSource = ds.Tables[0];
        }


        private void txtSearchByName_TextChanged(object sender, EventArgs e)
        {
            var sql = "select * from MedicineManagement where MedicineName like '%" + this.txtSearchByName.Text + "%'or MedicineId like '%" + this.txtSearchByName.Text + "%' ;";// or Id like '"+this.txtMovieId.Text+"%';";
            this.PopulateGridView(sql);
        }

        private void dgvMedicineManagement_DoubleClick_1(object sender, EventArgs e)
        {
            string crtName = this.dgvMedicineManagement.CurrentRow.Cells["MedicineName"].Value.ToString();
            string crtQuantity = "1";
            string crtPerUnitPrice = this.dgvMedicineManagement.CurrentRow.Cells["MedicinePricePerUnit"].Value.ToString();
            string crtPrice = this.dgvMedicineManagement.CurrentRow.Cells[3].Value.ToString();
            string crtId = this.dgvMedicineManagement.CurrentRow.Cells["MedicineId"].Value.ToString();

            bool alreadyAdded = false;

            for (int i = 0; i < dgvOrderList.Rows.Count; i++)
            {
                string columnValue = this.dgvOrderList.Rows[i].Cells["AddedMedicineId"].Value.ToString();
                if (columnValue.Equals(crtId))
                {
                    alreadyAdded = true;
                    MessageBox.Show(crtName + " is already added to the cart. Double click on cart to change quantity!");
                    return;
                }
            }

            if (int.Parse(this.dgvMedicineManagement.CurrentRow.Cells["MedicineQuantity"].Value.ToString()) <= 0)
            {
                MessageBox.Show("This Product Has Been Stocked Out!!");
                return;
            }


            ////MessageBox.Show(str);
            this.dgvOrderList.Rows.Add();
            this.dgvOrderList.Rows[(dgvOrderList.Rows.Count) - 1].Cells["OrderedMedicineName"].Value = crtName;
            this.dgvOrderList.Rows[(dgvOrderList.Rows.Count) - 1].Cells["OrderedQuantity"].Value = crtQuantity;
            this.dgvOrderList.Rows[(dgvOrderList.Rows.Count) - 1].Cells["OrderedPerUnitPrice"].Value = crtPerUnitPrice;
            this.dgvOrderList.Rows[(dgvOrderList.Rows.Count) - 1].Cells["OrderedPrice"].Value = crtPrice;
            this.dgvOrderList.Rows[(dgvOrderList.Rows.Count) - 1].Cells["AddedMedicineId"].Value = crtId;

            this.txtBoxQuantity.Text = "1";
            this.txtBoxQuantity.Focus();
            this.txtBoxQuantity.SelectionStart = 0;
            this.txtBoxQuantity.SelectionLength = this.txtBoxQuantity.Text.Length;

            int rowIdx = dgvOrderList.Rows.Count - 1;
            dgvOrderList.CurrentCell = dgvOrderList.Rows[rowIdx].Cells[0];
            dgvOrderList.CurrentRow.Selected = false;
            dgvOrderList.Rows[(dgvOrderList.Rows.Count) - 1].Selected = true;


        }

        private void OrderMedicine_FormClosing(object sender, FormClosingEventArgs e)
        {
            this.Hide();
            Environment.Exit(1);
        }

        private void btnBack_Click(object sender, EventArgs e)
        {
            this.Hide();
            employeePanel.Show();
        }

        private void dgvOrderList_DoubleClick(object sender, EventArgs e)
        {
            this.txtBoxQuantity.Text = this.dgvOrderList.CurrentRow.Cells["OrderedQuantity"].Value.ToString();
            this.txtBoxQuantity.Focus();
            this.txtBoxQuantity.SelectionStart = 0;
            this.txtBoxQuantity.SelectionLength = this.txtBoxQuantity.Text.Length;
        }

        private void btnConfirmOrder_Click(object sender, EventArgs e)
        {
            printPreviewDialog1.Document = printDocument1;
            printPreviewDialog1.ShowDialog();
        }

        private void btnUpdate_Click(object sender, EventArgs e)
        {
            //MessageBox.Show(this.dgvOrderList.CurrentRow.Cells[1].Value.ToString());
           
            int perUnitPrice = int.Parse(this.dgvOrderList.CurrentRow.Cells[1].Value.ToString()); 
            this.dgvOrderList.CurrentRow.Cells["OrderedPrice"].Value = (perUnitPrice * int.Parse(this.txtBoxQuantity.Text));
            this.dgvOrderList.CurrentRow.Cells["OrderedQuantity"].Value = this.txtBoxQuantity.Text;
            this.txtBoxQuantity.Clear();
        }

        

        private void printDocument1_PrintPage(object sender, System.Drawing.Printing.PrintPageEventArgs e)
        {
            Bitmap bitmap = new Bitmap(this.dgvOrderList.Width, this.dgvOrderList.Height);
            dgvOrderList.DrawToBitmap(bitmap,new Rectangle(0,0,this.dgvOrderList.Width,this.dgvOrderList.Height));
            e.Graphics.DrawImage(bitmap, 200, 150);
            //this.txtPrintTitle.Visible = true;

            int rowIdx = dgvOrderList.Rows.Count - 1;
            if(rowIdx > 0)
            {
                dgvOrderList.CurrentCell = dgvOrderList.Rows[rowIdx].Cells[0];
                dgvOrderList.CurrentRow.Selected = false;
                dgvOrderList.Rows[0].Selected = true;
            }

            e.Graphics.DrawString(this.txtPrintTitle.Text, new Font("Verdana", 20, FontStyle.Bold), Brushes.Black, new Point(350, 30));
        }
    }
}
