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

namespace WFAppDbPro
{
    public partial class Dashboard : Form
    {
        private DataAccess Da { get; set; }

        public Dashboard()
        {
            InitializeComponent();
            this.Da = new DataAccess();

            this.PopulateGridView();
        }

        private void PopulateGridView(string sql = "select * from Movie;")
        {
            var ds = this.Da.ExecuteQuery(sql);

            this.dgvMovie.AutoGenerateColumns = false;
            this.dgvMovie.DataSource = ds.Tables[0];
        }

        private void btnShow_Click(object sender, EventArgs e)
        {
            this.PopulateGridView();
        }

        private void btnSearch_Click(object sender, EventArgs e)
        {
            try
            {
                string sql = "select * from Movie where Genre = '" + this.txtSearch.Text + "';";
                this.PopulateGridView(sql);
            }
            catch (Exception exc)
            {
                MessageBox.Show("An error has occured: " + exc.Message);
            }
            
        }

        private void txtAutoSearch_TextChanged(object sender, EventArgs e)
        {
            var sql = "select * from Movie where Title like '" + this.txtTitle.Text + "%';";// or Id like '"+this.txtMovieId.Text+"%';";
            this.PopulateGridView(sql);
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

                var query = "select * from Movie where Id = '" + this.txtMovieId.Text + "';";
                var ds = this.Da.ExecuteQuery(query);

                if (ds.Tables[0].Rows.Count == 1)
                {
                    //update
                    var sql = @"update Movie
                                set Title = '" + this.txtTitle.Text + @"',
                                IMDB = " + this.txtIMDB.Text + @", 
                                Income = " + this.txtBoxOffice.Text + @",
                                ReleaseDate = '" + this.dtpReleaseDate.Text + @"',
                                Genre = '" + this.cmbGenre.Text + @"'
                                where Id = '" + this.txtMovieId.Text + "';";
                    int count = this.Da.ExecuteDMLQuery(sql);

                    if (count == 1)
                        MessageBox.Show("Data updated successfully");
                    else
                        MessageBox.Show("Data upgradation failed");
                }
                else
                {
                    //insert
                    var sql = @"insert into Movie values('" + this.txtMovieId.Text + "','" + this.txtTitle.Text + "'," + this.txtIMDB.Text + "," + this.txtBoxOffice.Text + ",'" + this.dtpReleaseDate.Text + "','" + this.cmbGenre.Text + "');";
                    int count = this.Da.ExecuteDMLQuery(sql);

                    if (count == 1)
                        MessageBox.Show("Data insertion successfull");
                    else
                        MessageBox.Show("Data insertion failed");
                }

                this.PopulateGridView();
                this.RefreshContent();
            }
            catch (Exception exc)
            {
                MessageBox.Show("An error has occured: " + exc.Message);
            }
        }

        private bool IsValidToSaveData()
        {
            if (String.IsNullOrEmpty(this.txtMovieId.Text) || String.IsNullOrEmpty(this.txtTitle.Text) ||
                String.IsNullOrEmpty(this.txtIMDB.Text) || String.IsNullOrEmpty(this.txtBoxOffice.Text) ||
                String.IsNullOrEmpty(this.cmbGenre.Text) || String.IsNullOrWhiteSpace(this.txtMovieId.Text))
            {
                return false;
            }
            else
                return true;
        }

        private void btnClear_Click(object sender, EventArgs e)
        {
            this.RefreshContent();
        }

        private void btnDelete_Click(object sender, EventArgs e)
        {
            try
            {
                var id = this.dgvMovie.CurrentRow.Cells[0].Value.ToString();
                var name = this.dgvMovie.CurrentRow.Cells[1].Value.ToString();

                var sql = "delete from Movie where Id = '" + id + "';";
                int count = this.Da.ExecuteDMLQuery(sql);

                if (count == 1)
                    MessageBox.Show(name + " has been deleted successfully");
                else
                    MessageBox.Show("Data deletion failed");

                this.PopulateGridView();
            }
            catch (Exception exc)
            {
                MessageBox.Show("An error has occured: " + exc.Message);
            }
        }

        private void dgvMovie_DoubleClick(object sender, EventArgs e)
        {
            this.txtMovieId.Text = this.dgvMovie.CurrentRow.Cells["Id"].Value.ToString();
            this.txtTitle.Text = this.dgvMovie.CurrentRow.Cells["Title"].Value.ToString();
            this.txtIMDB.Text = this.dgvMovie.CurrentRow.Cells["IMDB"].Value.ToString();
            this.txtBoxOffice.Text = this.dgvMovie.CurrentRow.Cells["Income"].Value.ToString();
            this.dtpReleaseDate.Text = this.dgvMovie.CurrentRow.Cells["ReleaseDate"].Value.ToString();
            this.cmbGenre.Text = this.dgvMovie.CurrentRow.Cells["Genre"].Value.ToString();
        }

        private void AutoIdGenerate()
        {
            
        }

        private void RefreshContent()
        {
            this.txtMovieId.Clear();
            this.txtTitle.Clear();
            this.txtIMDB.Clear();
            this.txtBoxOffice.Clear();
            this.dtpReleaseDate.Text = "";
            this.cmbGenre.SelectedIndex = -1;

            this.txtSearch.Clear();
            this.txtAutoSearch.Clear();
        }
    }
}
