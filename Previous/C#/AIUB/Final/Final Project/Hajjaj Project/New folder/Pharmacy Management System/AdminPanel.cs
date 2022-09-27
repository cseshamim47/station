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
    public partial class AdminPanel : Form
    {
        public string Id { get; set;  } 
        public LoginScreen loginScreen { get; set; } 
        public AdminProfile adminProfile { get; set; }
        public EmployeeManagement employeeManagement { get; set; }
        public MedicineManagement medicineManagement { get; set; }


        public AdminPanel()
        {
            InitializeComponent();
        }
        
        public AdminPanel(string id, LoginScreen loginScreen)
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
            if(adminProfile == null)
            {
                
                adminProfile = new AdminProfile(this.Id,this);
            }
            else
            {
                adminProfile.Id = this.Id;
            }

            this.Hide();
            adminProfile.Show();
        }

        private void AdminPanel_FormClosing(object sender, FormClosingEventArgs e)
        {
            this.Hide();
            Environment.Exit(1);
        }

        private void btnEmployeeManagement_Click(object sender, EventArgs e)
        {
            if (employeeManagement == null)
            {
                employeeManagement = new EmployeeManagement(this);
            }
            
            employeeManagement.Show();
            this.Hide();
        }

        private void btnMedicineManagement_Click(object sender, EventArgs e)
        {
            if (medicineManagement == null)
            {
                medicineManagement = new MedicineManagement(this);
            }

            medicineManagement.Show();
            this.Hide();

        }
    }
}
