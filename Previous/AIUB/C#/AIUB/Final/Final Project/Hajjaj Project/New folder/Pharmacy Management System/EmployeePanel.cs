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
    public partial class EmployeePanel : Form
    {
        internal EmployeeProfile employeeProfile { get; set; }
        internal string Id { get; set; }
        internal LoginScreen loginScreen { get; set; }
        public MedicineManagement medicineManagement { get; set; }
        public OrderMedicine orderMedicine { get; set; }


        public EmployeePanel()
        {
            InitializeComponent();
        }
        
        
        public EmployeePanel(string id, LoginScreen loginScreen)
        {
            InitializeComponent();
            this.Id = id;
            this.loginScreen = loginScreen;

        }

        private void btnLogOut_Click(object sender, EventArgs e)
        {
            loginScreen.Show();
            this.Hide();
        }

        private void btnProfile_Click(object sender, EventArgs e)
        {

            if(employeeProfile == null)
                employeeProfile = new EmployeeProfile(this,this.Id);
            else
            {
                employeeProfile.Id = this.Id;
            }

            employeeProfile.Show();
            this.Hide();
        }

        private void EmployeePanel_FormClosing(object sender, FormClosingEventArgs e)
        {
            this.Hide();
            Environment.Exit(1);
        }

        private void btnMedicineManagement_Click(object sender, EventArgs e)
        {
            if (medicineManagement == null)
            {
                medicineManagement = new MedicineManagement(this,"Employee");
            }
            else
            {
                medicineManagement.whoAmI = "Employee";
            }

            medicineManagement.Show();
            this.Hide();
        }

        private void btnOrderMedicine_Click(object sender, EventArgs e)
        {
            if (orderMedicine == null)
            {
                orderMedicine = new OrderMedicine(this, this.Id);
            }else
            {
                orderMedicine.Id = this.Id;
            }
            

            orderMedicine.Show();
            this.Hide();
        }
    }
}
