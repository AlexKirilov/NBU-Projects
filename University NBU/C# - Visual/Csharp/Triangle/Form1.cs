using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;

namespace WindowsFormsApplication1
{
    public partial class GeometryMain : Form
    {
        //S = √p(p - a)(p - b)(p - c) - Херонова формула
        int sideA;
        int sideB;
        int sideC;
        int rectangleFace;
        double triangleFace;
        double circleFace;
        int circleDimension;
        double circleRadius;
        double circleDiameter;
        double halfPerimeter;
        double underSuarqeValue;
        public const double PI = (22/7);
        /*----------------------*/
        String messageTrianleFace = "The Triangle Face is: ";
        String messageRectanglefleFace = "The Rectangle Face is: ";
        String messageCircleFace = "The Circle Face is: ";
        String messageHalfPerimeter = "The Half Perimeter is: ";
        /*Why System.Environment.Newline is working (not presented on framework)*/
        String newLine = "\r\n";
        /*-----------------------*/
        String triangleIcon;
        String rectangleIcon;
        String circleIcon;

        public GeometryMain()
        {
            InitializeComponent();
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            textBoxA.Visible = false;
            textBoxB.Visible = false;
            textBoxC.Visible = false;
            textBoxRorD.Visible = false;
            radioButtonDiameter.Hide();
            radioButtonRadius.Hide();
            pictureBoxGeometry.Hide();
        }

        private void textBoxA_TextChanged(object sender, EventArgs e)
        {
            this.sideA = 0;
            if (int.TryParse(textBoxA.Text, out sideA))
            {
                sideA = System.Convert.ToInt16(textBoxA.Text);
            } else if (textBoxA.Text != "") {
                MessageBox.Show("Inciorrect Input", "Inciorrect Input Error", MessageBoxButtons.RetryCancel, MessageBoxIcon.Question);
            }
        }

        private void textBoxA_Click(object sender, EventArgs e)
        {
            textBoxA.Clear();
        }

        private void textBoxB_TextChanged(object sender, EventArgs e)
        {
            this.sideB = 0;
            if (int.TryParse(textBoxB.Text, out sideB))
            {
                sideB = System.Convert.ToInt16(textBoxB.Text);
            } else if (textBoxB.Text != "") {
                MessageBox.Show("Inciorrect Input", "Inciorrect Input Error", MessageBoxButtons.RetryCancel, MessageBoxIcon.Question);
            }
        }

        private void textBoxB_Click(object sender, EventArgs e)
        {
            textBoxB.Clear();
        }

        private void textBoxC_TextChanged(object sender, EventArgs e)
        {
            this.sideC = 0;
            if (int.TryParse(textBoxC.Text, out sideC))
            {
                sideC = System.Convert.ToInt16(textBoxC.Text);
            } else if (textBoxC.Text != "") {
                MessageBox.Show("Inciorrect Input", "Inciorrect Input Error", MessageBoxButtons.RetryCancel, MessageBoxIcon.Question);
            }
        }

        private void textBoxC_Click(object sender, EventArgs e)
        {
            textBoxC.Clear();
        }

        private void textBoxD_TextChanged(object sender, EventArgs e)
        {
            this.circleDimension = 0;
            if (int.TryParse(textBoxRorD.Text, out circleDimension))
            {
                circleDimension = System.Convert.ToInt16(textBoxRorD.Text);
            } else if (textBoxRorD.Text != "") {
                MessageBox.Show("Inciorrect Input", "Inciorrect Input Error", MessageBoxButtons.RetryCancel, MessageBoxIcon.Question);
            }
        }

    private void textBoxD_Click(object sender, EventArgs e)
        {
            textBoxRorD.Clear();
        }

        private void buttonStart_Click(object sender, EventArgs e)
        {
            textBoxA.Visible = true;
            textBoxB.Visible = true;
            textBoxC.Visible = true;
            textBoxRorD.Visible = true;
            radioButtonDiameter.Show();
            radioButtonRadius.Show();
            pictureBoxGeometry.Show();
        }

        private void buttonCalcRectangle_Click(object sender, EventArgs e)
        {
           rectangleFace = this.sideA * this.sideB;
           labelResult.Text = messageRectanglefleFace + newLine + rectangleFace.ToString();
           rectangleIcon = "C:/Users/boyan/Desktop/Triangle/Triangle/Resources/RectangleIcon.ico";
           pictureBoxGeometry.Image = Image.FromFile(rectangleIcon);
        }

        private double halfPerimeterCalculation(int triangleSideA, int triangleSideB, int triangleSideC) {
            halfPerimeter = ((this.sideB + this.sideB + this.sideC)/2);
            return halfPerimeter;
        }

        private double underScuareValueCalculation(int triangleSideA, int triangleSideB, int triangleSideC)
        {
            halfPerimeter = halfPerimeterCalculation(sideA, sideB, sideC);
            double sideAHalfP = halfPerimeter - this.sideA;
            double sideBHalfP = halfPerimeter - this.sideB;
            double sideCHalfP = halfPerimeter - this.sideC;
            double allSidesHalfP = sideBHalfP * sideBHalfP * sideCHalfP;
            underSuarqeValue = allSidesHalfP * halfPerimeter;   
            return underSuarqeValue;
        }

        private void buttonCalcTriangle_Click(object sender, EventArgs e)
        {
            double uSSqVal = underScuareValueCalculation(sideA, sideB, sideC);
            triangleFace = Math.Sqrt(uSSqVal);
            labelResult.Text = messageTrianleFace + newLine + triangleFace.ToString();
            labelHalfPerimether.Text = messageHalfPerimeter + newLine + halfPerimeter.ToString();
            triangleIcon = "C:/Users/boyan/Desktop/Triangle/Triangle/Resources/TriangleIcon.ico";
            pictureBoxGeometry.Image = Image.FromFile(triangleIcon);
        }

        private void buttonCalcCircle_Click(object sender, EventArgs e)
        {
            if(radioButtonDiameter.Checked){
            double tempCircleVal = (circleDimension / 2);
            circleFace = tempCircleVal * tempCircleVal * PI;
            labelResult.Text = messageCircleFace + newLine + circleFace.ToString();
            } else {
                circleFace = circleRadius*circleRadius* PI;
                labelResult.Text = messageCircleFace + newLine + circleFace.ToString();
                    }
            labelResult.Text = messageCircleFace + newLine + circleFace.ToString();
            circleIcon = "C:/Users/boyan/Desktop/Triangle/Triangle/Resources/CircleIcon.ico";
            pictureBoxGeometry.Image = Image.FromFile(circleIcon);
        }

        private void radioButtonRadius_CheckedChanged(object sender, EventArgs e)
        {
            circleRadius = this.circleDimension;
        }

        private void radioButtonDiameter_CheckedChanged(object sender, EventArgs e)
        {
            circleDiameter = this.circleDimension;
        }
        
    }
}
