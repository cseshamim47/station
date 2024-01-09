using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace rockPaperScissor
{
    public partial class Form : System.Windows.Forms.Form
    {
        Random rnd = new Random();
        int round = -1;
        public Form()
        {
            InitializeComponent();
        }

        private void btnPlay_Click(object sender, EventArgs e)
        {
            tabControl1.SelectedIndex = 1;
            lblPlayer.Text = txtPlayer.Text;
            this.lblPlayerScore.Text = txtPlayer.Text;
            
        }

        void populateGrid()
        {
            dgvScoreTable.Rows.Clear();
            for (int i = 1; i <= 9; i++)
                this.dgvScoreTable.Rows.Add();
            this.txtComputerScore.Text = "0";
            this.txtPlayerScore.Text = "0";
            round = -1;
        }

        private void Form_Load(object sender, EventArgs e)
        {
            tabControl1.SelectedIndex = 1;
            this.picBoxPlayer.Image = null;
            this.dgvScoreTable.DefaultCellStyle.SelectionForeColor = Color.White;
            populateGrid();
            this.dgvScoreTable.DefaultCellStyle.Font = new System.Drawing.Font("Montserrat", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));

        }

        private void btnEndGame_Click(object sender, EventArgs e)
        {
            tabControl1.SelectedIndex = 0;
        }

        private void btnQuit_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        int computerPlay()
        {
            round++;
            int k = rnd.Next(1, 4);
            if(k == 1) this.picBoxComputer.Image = Properties.Resources.rock;
            else if(k == 2) this.picBoxComputer.Image = Properties.Resources.paper;
            else if(k == 3) this.picBoxComputer.Image = Properties.Resources.si;
            return k;
        }
        //System.Windows.Forms.MessageBox.Show("My message here");
        private void btnRock_Click(object sender, EventArgs e)
        {
            this.picBoxPlayer.Image = Properties.Resources.rock;
            int k = this.computerPlay();
            if (k == 1)
            { 
                System.Windows.Forms.MessageBox.Show("Draw!!");
                this.dgvScoreTable.Rows[round].Cells[2].Value = "Draw";
                this.dgvScoreTable.Rows[round].Cells[0].Value = "Rock";
                this.dgvScoreTable.Rows[round].Cells[1].Value = "Rock";

            }else if(k == 3)
            {
                System.Windows.Forms.MessageBox.Show(this.lblPlayer.Text + " Wins!!");
                this.dgvScoreTable.Rows[round].Cells[2].Value = this.lblPlayer.Text;
                this.dgvScoreTable.Rows[round].Cells[0].Value = "Rock";
                this.dgvScoreTable.Rows[round].Cells[1].Value = "Scissor";
                this.txtPlayerScore.Text = (Convert.ToInt32(this.txtPlayerScore.Text) + 1).ToString();
            }
            else
            {
                System.Windows.Forms.MessageBox.Show("Computer Wins!!");
                this.dgvScoreTable.Rows[round].Cells[2].Value = "Computer";
                this.dgvScoreTable.Rows[round].Cells[0].Value = "Rock";
                this.dgvScoreTable.Rows[round].Cells[1].Value = "Paper";
                this.txtComputerScore.Text = (Convert.ToInt32(this.txtComputerScore.Text) + 1).ToString();
            }
            this.picBoxComputer.Image = null;
            this.picBoxPlayer.Image = null;
            if (round == 4)
            {
                string verdict = "Draw";
                if (Convert.ToInt32(this.txtComputerScore.Text) > Convert.ToInt32(this.txtPlayerScore.Text)) verdict = "Computer wins, YOU LOSER!!\n";
                else if (Convert.ToInt32(this.txtComputerScore.Text) < Convert.ToInt32(this.txtPlayerScore.Text)) verdict = "You Won!!\n";
                System.Windows.Forms.MessageBox.Show(verdict + this.lblPlayer.Text + " Score : " + this.txtPlayerScore.Text + "\n" + "Computer Score : " + this.txtComputerScore.Text);
                this.populateGrid();
            }
        }

        private void btnPaper_Click(object sender, EventArgs e)
        {
            this.picBoxPlayer.Image = Properties.Resources.paper;
            int k = this.computerPlay();
            if (k == 2)
            {
                System.Windows.Forms.MessageBox.Show("Draw!!");
                this.dgvScoreTable.Rows[round].Cells[2].Value = "Draw";
                this.dgvScoreTable.Rows[round].Cells[0].Value = "Paper";
                this.dgvScoreTable.Rows[round].Cells[1].Value = "Paper";
            }else if (k == 1)
            {
                System.Windows.Forms.MessageBox.Show(this.lblPlayer.Text + " Wins!!");
                this.dgvScoreTable.Rows[round].Cells[2].Value = this.lblPlayer.Text;
                this.dgvScoreTable.Rows[round].Cells[0].Value = "Paper";
                this.dgvScoreTable.Rows[round].Cells[1].Value = "Rock";
                this.txtPlayerScore.Text = (Convert.ToInt32(this.txtPlayerScore.Text) + 1).ToString();
            }
            else
            {
                System.Windows.Forms.MessageBox.Show("Computer Wins!!");
                this.dgvScoreTable.Rows[round].Cells[2].Value = "Compuet";
                this.dgvScoreTable.Rows[round].Cells[0].Value = "Paper";
                this.dgvScoreTable.Rows[round].Cells[1].Value = "Scissor";
                this.txtComputerScore.Text = (Convert.ToInt32(this.txtComputerScore.Text) + 1).ToString();
            }
            this.picBoxPlayer.Image = null;
            this.picBoxComputer.Image = null;
            if (round == 4)
            {
                string verdict = "Game Draw!!\n";
                 if (Convert.ToInt32(this.txtComputerScore.Text) > Convert.ToInt32(this.txtPlayerScore.Text)) verdict = "Computer wins, YOU LOSER!!\n";
                else if (Convert.ToInt32(this.txtComputerScore.Text) < Convert.ToInt32(this.txtPlayerScore.Text)) verdict = "You Won!!\n";
                System.Windows.Forms.MessageBox.Show(verdict + this.lblPlayer.Text + " Score : " + this.txtPlayerScore.Text + "\n" + "Computer Score : " + this.txtComputerScore.Text);
                this.populateGrid();
            }
        }

        private void btnSi_Click(object sender, EventArgs e)
        {
            this.picBoxPlayer.Image = Properties.Resources.si;
            int k = this.computerPlay();
            if (k == 3)
            {
                System.Windows.Forms.MessageBox.Show("Draw!!");
                this.dgvScoreTable.Rows[round].Cells[2].Value = "Draw";
                this.dgvScoreTable.Rows[round].Cells[0].Value = "Scissor";
                this.dgvScoreTable.Rows[round].Cells[1].Value = "Scissor";
            }
            else if (k == 2)
            {
                System.Windows.Forms.MessageBox.Show(this.lblPlayer.Text + " Wins!!");
                this.dgvScoreTable.Rows[round].Cells[2].Value = this.lblPlayer.Text;
                this.dgvScoreTable.Rows[round].Cells[0].Value = "Scissor";
                this.dgvScoreTable.Rows[round].Cells[1].Value = "Paper";
                this.txtPlayerScore.Text = (Convert.ToInt32(this.txtPlayerScore.Text) + 1).ToString();
            }
            else
            {
                System.Windows.Forms.MessageBox.Show("Computer Wins!!");
                this.dgvScoreTable.Rows[round].Cells[2].Value = "Computer";
                this.dgvScoreTable.Rows[round].Cells[0].Value = "Scissor";
                this.dgvScoreTable.Rows[round].Cells[1].Value = "Rock";
                this.txtComputerScore.Text = (Convert.ToInt32(this.txtComputerScore.Text) + 1).ToString();
            }
            this.picBoxPlayer.Image = null;
            this.picBoxComputer.Image = null;
            if (round == 4)
            {
                string verdict = "Draw";
                if (Convert.ToInt32(this.txtComputerScore.Text) > Convert.ToInt32(this.txtPlayerScore.Text)) verdict = "Computer wins, YOU LOSER!!\n";
                else if (Convert.ToInt32(this.txtComputerScore.Text) < Convert.ToInt32(this.txtPlayerScore.Text)) verdict = "You Won!!\n";
                System.Windows.Forms.MessageBox.Show(verdict + this.lblPlayer.Text + " Score : " + this.txtPlayerScore.Text + "\n" + "Computer Score : " + this.txtComputerScore.Text);
                this.populateGrid();
            }
        }
    }
}
