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
    public partial class FormLogin : Form
    {
        public FormLogin()
        {
            InitializeComponent();
        }

        private void btnLogin_Click(object sender, EventArgs e)
        {
            //bruce -- 123   clerk -- 456
            //if (this.txtUserId.Text.ToLower().Equals("bruce") && this.txtPassword.Text.Equals("123"))
            //{
            //    MessageBox.Show("Login Valid");
            //}
            //else if (this.txtUserId.Text.ToLower().Equals("clerk") && this.txtPassword.Text.Equals("456"))
            //{
            //    MessageBox.Show("Login Valid");
            //}
            //else
            //{
            //    MessageBox.Show("Login Invalid");
            //}
            string sql = "select * from UserInfo where Id = '" + this.txtUserId.Text + "' and Password = '" + this.txtPassword.Text + "';";
            SqlConnection sqlcon = new SqlConnection("Data Source=HASIB-LAPTOP;Initial Catalog=rsummerdb;User ID=sa;Password=P@$$w0rd");
            sqlcon.Open();
            SqlCommand sqlcom = new SqlCommand(sql, sqlcon);
            SqlDataAdapter sda = new SqlDataAdapter(sqlcom);
            DataSet ds = new DataSet();
            sda.Fill(ds);

            if (ds.Tables[0].Rows.Count == 1)
            {
                this.ClearContent();
                this.Hide();
                MessageBox.Show("Login Valid");
                string name = ds.Tables[0].Rows[0][1].ToString();

                if (ds.Tables[0].Rows[0][3].ToString() == "admin")
                {
                    FormAdmin admin = new FormAdmin(this, name);
                    admin.Show();
                }
                else if (ds.Tables[0].Rows[0][3].ToString() == "member")
                {
                    FormMember member = new FormMember(this, name);
                    member.Show();
                }
                
            }
            else
            {
                MessageBox.Show("Login Invalid");
                this.ClearContent();
            }

            //int count = 0;
            //while (count < ds.Tables[0].Rows.Count)
            //{
            //    if (this.txtUserId.Text.ToLower() == ds.Tables[0].Rows[count][0].ToString() && this.txtPassword.Text == ds.Tables[0].Rows[count][2].ToString())
            //    {
            //        MessageBox.Show("Login Valid");
            //        break;
            //    }
            //    count++;
            //}

            sqlcon.Close();
        }

        private void btnClear_Click(object sender, EventArgs e)
        {
            this.ClearContent();
        }

        private void ClearContent()
        {
            this.txtUserId.Clear();
            this.txtPassword.Clear();
        }
    }
}
