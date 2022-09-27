using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;
namespace CalculatorAssignment
{

    
    public partial class Calculator : Form
    {
        double FirstNumber;
        string Operation;

        public Calculator()
        {
            InitializeComponent();
        }

        private void Calculator_Load(object sender, EventArgs e)
        {
            if (this.textBox1.Text == "0" && this.textBox1.Text != null)
            {
                this.textBox1.Text = "1";
            }
            else
            {
                this.textBox1.Text = this.textBox1.Text + "0";
            }
        }

        private void button13_Click(object sender, EventArgs e)
        {
            if (this.textBox1.Text == "0" && this.textBox1.Text != null)
            {
                this.textBox1.Text = "1";
            }
            else
            {
                this.textBox1.Text = this.textBox1.Text + "1";
            }
        }

        private void button14_Click(object sender, EventArgs e)
        {
            if (this.textBox1.Text == "0" && this.textBox1.Text != null)
            {
                this.textBox1.Text = "2";
            }
            else
            {
                this.textBox1.Text = this.textBox1.Text + "2";
            }
        }

        private void button15_Click(object sender, EventArgs e)
        {
            if (this.textBox1.Text == "0" && this.textBox1.Text != null)
            {
                this.textBox1.Text = "3";
            }
            else
            {
                this.textBox1.Text = this.textBox1.Text + "3";
            }
        }

        private void button9_Click(object sender, EventArgs e)
        {
            if (this.textBox1.Text == "0" && this.textBox1.Text != null)
            {
                this.textBox1.Text = "4";
            }
            else
            {
                this.textBox1.Text = this.textBox1.Text + "4";
            }
        }

        private void button10_Click(object sender, EventArgs e)
        {
            if (this.textBox1.Text == "0" && this.textBox1.Text != null)
            {
                this.textBox1.Text = "5";
            }
            else
            {
                this.textBox1.Text = this.textBox1.Text + "5";
            }
        }

        private void button11_Click(object sender, EventArgs e)
        {
            if (this.textBox1.Text == "0" && this.textBox1.Text != null)
            {
                this.textBox1.Text = "6";
            }
            else
            {
                this.textBox1.Text = this.textBox1.Text + "6";
            }
        }

        private void button5_Click(object sender, EventArgs e)
        {
            if (this.textBox1.Text == "0" && this.textBox1.Text != null)
            {
                this.textBox1.Text = "7";
            }
            else
            {
                this.textBox1.Text = this.textBox1.Text + "7";
            }
        }

        private void button6_Click(object sender, EventArgs e)
        {
            if (this.textBox1.Text == "0" && this.textBox1.Text != null)
            {
                this.textBox1.Text = "8";
            }
            else
            {
                this.textBox1.Text = this.textBox1.Text + "8";
            }
        }

        private void button7_Click(object sender, EventArgs e)
        {
            if (this.textBox1.Text == "0" && this.textBox1.Text != null)
            {
                this.textBox1.Text = "9";
            }
            else
            {
                this.textBox1.Text = this.textBox1.Text + "9";
            }
        }

        private void button18_Click(object sender, EventArgs e)
        {
            this.textBox1.Text = this.textBox1.Text + "0";
        }

        private void button16_Click(object sender, EventArgs e)
        {
            FirstNumber = Convert.ToDouble(this.textBox1.Text);
            this.textBox1.Text = "0";
            Operation = "+";
        }

        private void button12_Click(object sender, EventArgs e)
        {
            FirstNumber = Convert.ToDouble(this.textBox1.Text);
            this.textBox1.Text = "0";
            Operation = "-";
        }

        private void button8_Click(object sender, EventArgs e)
        {
            FirstNumber = Convert.ToDouble(this.textBox1.Text);
            this.textBox1.Text = "0";
            Operation = "*";
        }

        private void button4_Click(object sender, EventArgs e)
        {
            FirstNumber = Convert.ToDouble(this.textBox1.Text);
            this.textBox1.Text = "0";
            Operation = "/";
        }

        private void btnClear_Click(object sender, EventArgs e)
        {
            this.textBox1.Text = "0";
        }

        private void button19_Click(object sender, EventArgs e)
        {
            this.textBox1.Text = this.textBox1.Text + ".";
        }

        private void button20_Click(object sender, EventArgs e)
        {
            double SecondNumber;
            double Result;

            SecondNumber = Convert.ToDouble(this.textBox1.Text);

            if (Operation == "+")
            {
                Result = (FirstNumber + SecondNumber);
                this.textBox1.Text = Convert.ToString(Result);
                FirstNumber = Result;
            }
            if (Operation == "-")
            {
                Result = (FirstNumber - SecondNumber);
                this.textBox1.Text = Convert.ToString(Result);
                FirstNumber = Result;
            }
            if (Operation == "*")
            {
                Result = (FirstNumber * SecondNumber);
                this.textBox1.Text = Convert.ToString(Result);
                FirstNumber = Result;
            }
            if (Operation == "/")
            {
                if (SecondNumber == 0)
                {
                    this.textBox1.Text = "Cannot divide by zero";

                }
                else
                {
                    Result = (FirstNumber / SecondNumber);
                    this.textBox1.Text = Convert.ToString(Result);
                    FirstNumber = Result;
                }
            }
        }
    }
}