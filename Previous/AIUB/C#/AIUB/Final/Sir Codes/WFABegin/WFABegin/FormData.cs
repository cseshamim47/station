using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace WFABegin
{
    public partial class FormData : Form
    {
        public FormData()
        {
            InitializeComponent();
        }

        private void btnShow_Click(object sender, EventArgs e)
        {
            this.txtOutputUsername.Text = this.txtUsername.Text;
            this.lblPassword.Text = this.txtPassword.Text;
            this.lblDepartment.Text = this.cmbDepartment.Text;
            this.lblDOB.Text = this.dtpDOB.Text;
            if (this.rbBachelors.Checked)
                this.lblProgram.Text = "Bachelors";
            else if (this.rbMasters.Checked)
                this.lblProgram.Text = this.rbMasters.Text;

            this.pnlOutput.Visible = true;
        }

        private void btnClear_Click(object sender, EventArgs e)
        {
            this.txtOutputUsername.Text = "";
            this.lblPassword.Text = "";
            this.lblDepartment.Text = "";
            this.lblDOB.Text = "abcd";
            this.lblProgram.Text = "";

            this.txtUsername.Text = "";
            this.txtPassword.Text = "";
            this.cmbDepartment.SelectedIndex = -1;//this.cmbDepartment.Text = "";
            this.dtpDOB.Text = "";
            this.rbBachelors.Checked = false;
            this.rbMasters.Checked = false;

            this.pnlOutput.Visible = false;
        }
    }
}
