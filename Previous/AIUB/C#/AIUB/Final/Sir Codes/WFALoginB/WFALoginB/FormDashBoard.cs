using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace WFALoginB
{
    public partial class FormDashBoard : Form
    {
        public FormDashBoard()
        {
            InitializeComponent();
        }

        private void btnShowDetails_Click(object sender, EventArgs e)
        {
            DataAccess da = new DataAccess();
            var ds = da.ExecuteQuery("select * from Movie;");
            
            this.dgvMovie.AutoGenerateColumns = false;
            this.dgvMovie.DataSource = ds.Tables[0];
            
        }
    }
}
