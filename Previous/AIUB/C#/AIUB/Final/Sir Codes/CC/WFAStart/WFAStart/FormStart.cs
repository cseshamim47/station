using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace WFAStart
{
    public partial class FormStart : Form
    {
        public FormStart()
        {
            InitializeComponent();
        }

        private void btnShow_Click(object sender, EventArgs e)
        {
            if (String.IsNullOrEmpty(this.txtUsername.Text) || String.IsNullOrEmpty(this.txtPassword.Text))
            {
                return;
            }
            this.txtOutputUsername.Text = this.txtUsername.Text;
            this.lblPassword.Text = this.txtPassword.Text;
            this.lblDepartment.Text = this.cmbDepartment.Text;
            this.lblDOB.Text = this.dtpDOB.Text;
            if (this.rbMale.Checked)
                this.lblGender.Text = "Male";
            else if(this.rbFemale.Checked)
                this.lblGender.Text = "Female";

            this.pnlOutput.Visible = true;
        }

        private void btnClear_Click(object sender, EventArgs e)
        {
            this.txtUsername.Text = "";
            this.txtPassword.Text = "";
            this.cmbDepartment.SelectedIndex = -1;//this.cmbDepartment.Text = "";
            this.dtpDOB.Text = "";
            this.rbMale.Checked = false;
            this.rbFemale.Checked = false;

            this.txtOutputUsername.Text = "";
            this.lblPassword.Text = "oPassword";
            this.lblDepartment.Text = "";
            this.lblDOB.Text = "";
            this.lblGender.Text = "";

            this.pnlOutput.Visible = false;
        }
    }
}
