using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace CalculatorZad3
{
    public partial class Form1 : Form
    {
        Double value = 0;
        String operation = ""; // da prihvashta vida na matemati4eskite operacii
        bool operation_pressed = false; //6te ni pozvoli da zabranim multi pressing na button
        public Form1()
        {
            InitializeComponent();
        }

        private void button0_Click(object sender, EventArgs e)
        {
            result.Text = result.Text + "1";
        }

        private void button_Click(object sender, EventArgs e)
        {
            // if koito izchistva purvonachalnata 0 , kato proverqva stoinosta na result /rezultata/
            if ((result.Text == "0") || (operation_pressed)) result.Clear();
            operation_pressed = false;
            //Prevru6tame sender metoda v button
            Button b = (Button)sender;
            //Proverqva me dali veche e izpolzvana to4ka vednaj v 1 uravnenie, ako da ne dopuskame povtorenie
            if (b.Text == ".")
            {
                if (result.Text.Contains(".")) result.Text = result.Text + b.Text;
                else result.Text = result.Text + b.Text;
            }
            result.Text = result.Text + b.Text; 
            //b.Text pozvolqva da izvejdaneto na ekrana to4no tozi button koito e bil natisnat.
            //pozvolqva naslagvane na stoinostite izvejdashti na ekrana.

        }

        private void button16_Click(object sender, EventArgs e)
        {
            result.Text = "0"; // Izchistva ekrana /rezultata/ priravnqva na 0
        }

        private void operator_click(object sender, EventArgs e)
        {
            //Prevru6tame sender metoda v button
            Button b = (Button)sender;
            //Premahvame nujdata ot postoqnnoto izpolzvane na ravnoto.
            if (value != 0)
            {
                button18.PerformClick();
                operation = b.Text;
                operation_pressed = true;
                equation.Text = value + " " + operation;
            }
            else
            {
                operation = b.Text;
                value = Double.Parse(result.Text);
                operation_pressed = true;
                equation.Text = value + " " + operation;
            }
            operation = b.Text;
            value = Double.Parse(result.Text);
            operation_pressed = true; // Zabranqva me multi+pressa
            equation.Text = value + " " + operation; // vmukvame stoinostta i operatora 
        }

        private void button18_Click(object sender, EventArgs e)
        {
            equation.Text = ""; //iztrivame stoinosta i q zamestvame s prazno prostranstvo.
            switch (operation)
            {
                case "+": result.Text = (value + Double.Parse(result.Text)).ToString(); break;
                case "-": result.Text = (value - Double.Parse(result.Text)).ToString(); break;
                case "*": result.Text = (value * Double.Parse(result.Text)).ToString(); break;
                case "/": result.Text = (value / Double.Parse(result.Text)).ToString(); break;
                default: break;
            }//end switch
            value = Int32.Parse(result.Text);
            operation = "";
        }

        private void button17_Click(object sender, EventArgs e)
        {
            result.Clear();
            value = 0;
        }

        private void result_TextChanged(object sender, EventArgs e)
        {

        }

        private void Form1_Load(object sender, EventArgs e)
        {

        }
    }
}
