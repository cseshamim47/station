using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace WFALogin
{
    public partial class FormDB : Form
    {
        public FormDB()
        {
            InitializeComponent();
        }

        private void btnPress_Click(object sender, EventArgs e)
        {
            SqlConnection sqlcon = new SqlConnection("Data Source=HASIB-LAPTOP;Initial Catalog=rsummerdb;User ID=sa;Password=P@$$w0rd");
            sqlcon.Open();
            SqlCommand sqlcom = new SqlCommand("select * from UserInfo;", sqlcon);
            SqlDataAdapter sda = new SqlDataAdapter(sqlcom);
            DataSet ds = new DataSet();
            sda.Fill(ds);

            this.lblInfo.Text = ds.Tables[0].Rows[2][2].ToString();

            sqlcon.Close();
        }
    }
}
