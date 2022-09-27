using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Data.SqlClient;

namespace WFALoginB
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            var query = "select * from UserInfo;";
            SqlConnection sqlcon = new SqlConnection("Data Source=LAPTOP-HASIB;Initial Catalog=bsummerdb;User ID=sa;Password=P@$$w0rd");
            sqlcon.Open();
            SqlCommand sqlcom = new SqlCommand(query, sqlcon);
            SqlDataAdapter sda = new SqlDataAdapter(sqlcom);
            DataSet ds = new DataSet();
            sda.Fill(ds);

            this.label1.Text = ds.Tables[0].Rows[0][0].ToString();
            this.label2.Text = ds.Tables[0].Rows[0][1].ToString();
            this.label3.Text = ds.Tables[0].Rows[0][2].ToString();
            this.label4.Text = ds.Tables[0].Rows[3][3].ToString();

            sqlcon.Close();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            var query = "select * from UserInfo where Id = '" + this.textBox1.Text + "' and Password = '" + this.textBox2.Text + "';";
            SqlConnection sqlcon = new SqlConnection("Data Source=LAPTOP-HASIB;Initial Catalog=bsummerdb;User ID=sa;Password=P@$$w0rd");
            sqlcon.Open();
            SqlCommand sqlcom = new SqlCommand(query, sqlcon);
            SqlDataAdapter sda = new SqlDataAdapter(sqlcom);
            DataSet ds = new DataSet();
            sda.Fill(ds);

            if (ds.Tables[0].Rows.Count == 1)
            {
                MessageBox.Show("Login Confirmed");
                if (ds.Tables[0].Rows[0][3].ToString().ToLower() == "owner")
                {
                    new FormOwner().Visible = true;
                }
                else if (ds.Tables[0].Rows[0][3].ToString().ToLower() == "employee")
                {
                    new FormEmp().Visible = true;
                }
            }
            else
                MessageBox.Show("Invalid Information");
        }
    }
}
