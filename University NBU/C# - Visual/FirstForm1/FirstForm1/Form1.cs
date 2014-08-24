using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace FirstForm1
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        public void calc_Click(object sender, EventArgs e)
        {
            double a = Int32.Parse(StA.Text);
            double b = Int32.Parse(StB.Text);
            double c = Int32.Parse(StC.Text);
            double res;
            if (a == 0)
            {
                if (b == 0)
                {
                    if (c == 0) label5.Text = "Vsqko x e reshenie";
                    else label5.Text = "Urv nqma reshenie";
                }
                else
                {
                    res = -c / b;
                    label5.Text = res.ToString();
                }
            }
            else
            {
                double x1, x2, d;
                d = b*b - 4*a*c;
                x1 = (-b + Math.Sqrt(d)) / (2 * a);
                x2 = (-b - Math.Sqrt(d)) / (2 * a);
                label5.Text = "X1= " + x1.ToString() +"     "+ "X2= "+x2.ToString();
            }
        }


       

           }
}
