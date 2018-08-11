import java.awt.Color;
import java.awt.Graphics;
import java.awt.GridLayout;
import java.awt.Point;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.io.Serializable;
import java.util.Vector;
import javax.swing.JButton;
import javax.swing.JFileChooser;
import javax.swing.JFrame;
import javax.swing.JMenu;
import javax.swing.JMenuBar;
import javax.swing.JMenuItem;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.filechooser.FileNameExtensionFilter;

// 1.������ �����ų ��ü�� �����Ѵ�. (class)
// 2.������ �׸� ������ Ŭ���� ��ü�� ��� �迭�� �����Ų��.
class Shape implements Serializable {

	// ������ �� ���� �� ����???
	int StartX, StartY;
	int Shape;

	// 3���� ������ ��� �޾� �;��ϴ� ���� �θ� �����ڿ� �����Ѵ�.
	Shape(int argshap, int argX, int argY) {
		this.StartX = argX;
		this.StartY = argY;
		this.Shape = argshap;
	}
}

class Line extends Shape {
	int EndX, EndY;

	// ���� ������ ���콺 Ŀ�� ��ġ�� �߰��� �������ش�.
	Line(int argshap, int argX, int argY, int EndX, int EndY) {
		super(argshap, argX, argY);

		this.EndX = EndX;
		this.EndY = EndY;

	}

}

// �׸�� ���� ����� �ʿ��ϱ� ������ ������ �߰��� �������ش�.
class Rect extends Shape {
	int width, height;

	Rect(int argshap, int argX, int argY, int width, int height) {
		super(argshap, argX, argY);

		this.width = width;
		this.height = height;

	}
}

class Circle extends Shape {
	int width, height;

	Circle(int argshap, int argX, int argY, int width, int height) {
		super(argshap, argX, argY);
		this.width = width;
		this.height = height;
	}
}

class MyFrame extends JFrame {
	// �׸� ������ �����ų ���͸� ����ش�.
	protected Vector<Shape> vc = new Vector<Shape>();

	// ������ ��µ� ������ �ǳ�
	class right_J extends JPanel{

		int width, height, x, y;
		Point start, end;

		right_J() {
			try{
				this.addMouseListener(new MouseAdapter() {
					// ���� ������ ��쿡 ó�� ���� ��ǥ�� �޾ƿ´�.
					public void mousePressed(MouseEvent e) {
						if (shape.equals("Line")) {
							start = e.getPoint();
						}

					}

					// ���� �׸��� �� �� ������ ��ǥ�� �޾ƿ� ������ �׷��� �� ���� ��ü�� ��������ش�.
					public void mouseReleased(MouseEvent e) {
						if (shape.equals("Line")) {
							end = e.getPoint();
							Graphics g = rightpanel.getGraphics();
							g.drawLine(start.x, start.y, end.x, end.y);
							Shape d_L = new Line(1, start.x, start.y, end.x, end.y);
							vc.add(d_L);
						}
					}

					public void mouseClicked(MouseEvent e) {

						Graphics g = rightpanel.getGraphics();

						switch (shape) {
						// �׸� �������� ��� ó�� ���� ��ǥ�� �ҷ��ͼ� �׷��ش�.
						case "Rect":
							width = 100;
							height = 100;
							x = e.getX() - width / 2;
							y = e.getY() - height / 2;
							g.setColor(Color.YELLOW);
							g.fillRect(x, y, width, height);
							Shape d_R = new Rect(2, x, y, width, height);
							vc.add(d_R);
							break;

						// ���� �������� ��
						case "Circle":
							width = 100;
							height = 100;
							x = e.getX() - width / 2;
							y = e.getY() - height / 2;
							g.drawOval(x, y, width, height);
							Shape d_C = new Circle(3, x, y, width, height);
							vc.add(d_C);
							break;
						}
					}
				});
			}catch(NullPointerException npe){
				System.out.println("NullPointerException!");
			}
			
			
		}

		// �������� ���¹ٷ� ���� �� �ٽ� �÷��� �� ������ ������� �ʰ� ��� �ֵ��� �ϱ� ����(�ٽ� �����·� �׷���) paint
		public void paintComponent(Graphics g) {
			//������ �׸� ������ ��������� ���͸� �ҷ��� �ٽ� ��½����ش�.
			for (int i = 0; i < vc.size(); i++) {
				Shape o = vc.get(i);
				if (o.Shape == 1) {
					Line o1 = (Line) vc.get(i);
					g.drawLine(o1.StartX, o1.StartY, o1.EndX, o1.EndY);
				} else if (o.Shape == 2) {
					Rect o11 = (Rect) vc.get(i);
					g.drawRect(o11.StartX, o11.StartY, o11.width, o11.height);
				} else if (o.Shape == 3) {
					Circle o11 = (Circle) vc.get(i);
					g.drawOval(o11.StartX, o11.StartY, o11.width, o11.height);
				}

			}
		}
	}

	JPanel leftpanel, rightpanel;
	JButton BtnLine, BtnRect, BtnCircle, BtnClear, check;
	Color BackgroundColor;
	String shape;

	MyFrame() {

		setTitle("GUI_grow");
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);

		this.setSize(1000, 1000);
		this.getContentPane().setLayout(new GridLayout(0, 2));
		leftpanel = new JPanel();
		rightpanel = new right_J();

		this.add(leftpanel);
		this.add(rightpanel);

		leftpanel.setLayout(new GridLayout(4, 0));

		BtnLine = new JButton("��");
		BtnRect = new JButton("����");
		BtnCircle = new JButton("��");
		BtnClear = new JButton("Ἢ�");
		BackgroundColor = BtnCircle.getBackground();

		leftpanel.add(BtnLine);
		leftpanel.add(BtnRect);
		leftpanel.add(BtnCircle);
		leftpanel.add(BtnClear);

		BtnLine.addMouseListener(new MouseAdapter() {
			public void mouseClicked(MouseEvent e) {
				if (e.getSource() != check) {
					BtnLine.setBackground(Color.YELLOW);
					shape = "Line";
				}
				if (check != null) {
					check.setBackground(BackgroundColor);
				}
				check = (JButton) e.getSource();
			}
		});
		
		BtnRect.addMouseListener(new MouseAdapter() {
			public void mouseClicked(MouseEvent e) {
				if (e.getSource() != check) {
					BtnRect.setBackground(Color.YELLOW);
					shape = "Rect";
				}
				if (check != null) {
					check.setBackground(BackgroundColor);
				}
				check = (JButton) e.getSource();
			}
		});

		BtnCircle.addMouseListener(new MouseAdapter() {
			public void mouseClicked(MouseEvent e) {
				if (e.getSource() != check) {
					BtnCircle.setBackground(Color.YELLOW);
					shape = "Circle";
				}
				if (check != null) {
					check.setBackground(BackgroundColor);
				}
				check = (JButton) e.getSource();
			}
		});
		
		BtnClear.addMouseListener(new MouseAdapter() {
			public void mouseClicked(MouseEvent e) {
				if (e.getSource() != check) {
					vc.clear();
					repaint();
					
					shape = "";
				}
				if (check != null) {
					check.setBackground(BackgroundColor);
				}
				check = (JButton) e.getSource();
			}
		});

		// fail��ܹ�
		JMenuBar menuBar = new JMenuBar();
		JMenu menu = new JMenu("File");
		menuBar.add(menu);

		JMenuItem menuItem1 = new JMenuItem("save");
		menu.add(menuItem1);
		menu.addSeparator();
		JMenuItem menuItem2 = new JMenuItem("Load");
		menu.add(menuItem2);
		menu.addSeparator();
		JMenuItem menuItem3 = new JMenuItem("exit");
		menu.add(menuItem3);
		this.setJMenuBar(menuBar);
		
		//���� ��ư�� ������ ��
		menuItem1.addActionListener(new ActionListener() {
			@Override
			public void actionPerformed(ActionEvent e) {
				
				JFileChooser fileChooser = new JFileChooser();
	            //Ȯ���ڸ� �߰������ش�.
				fileChooser.setFileFilter(new FileNameExtensionFilter("myBoard", "dyjang"));
				fileChooser.setFileFilter(new FileNameExtensionFilter("default", "txt"));
	            
				//���� ������ Ȯ���� ���� ������ �´�.
				String fileExtension = ((FileNameExtensionFilter)fileChooser.getFileFilter()).getExtensions()[0];
	            
				//showSaveDialog->���� ���� ���̾�α׸� ���, APPROVE_OPTION->���, �ݱ� ��ư�� �ƴ϶� Ȯ���� �������� Ȯ��	
	            if(fileChooser.showSaveDialog(menuItem1) == JFileChooser.APPROVE_OPTION){
	            	//���� ������ ���ϸ��� ������ �´�.
	            	String fileName = fileChooser.getSelectedFile().getAbsolutePath();
	            	
	            	try{
	            		//���� ������� ����ϴ� Ŭ������ ��ü�� ��� ���� ����
	            		InputOutput objToFile = new InputOutput(true , fileName + "." + fileExtension);
	            		
	            	}catch(Exception argException){
	            		System.out.println("3: " + argException.getMessage());
	            	}
	            }
			}
		});

		menuItem2.addActionListener(new ActionListener() {

			@Override
			public void actionPerformed(ActionEvent e) {
				
				JFileChooser fileChooser = new JFileChooser();
				
	            fileChooser.setFileFilter(new FileNameExtensionFilter("myBoard", "dyjang"));
	            fileChooser.setFileFilter(new FileNameExtensionFilter("default", "txt"));
	            
	            //String fileExtension = ((FileNameExtensionFilter)fileChooser.getFileFilter()).getExtensions()[0];
	            
	            if(fileChooser.showOpenDialog(menuItem2) == JFileChooser.APPROVE_OPTION){
	            	String fileName = fileChooser.getSelectedFile().getAbsolutePath();
	            	
	            	try{
	            		InputOutput objToFile = new InputOutput(false , fileName);
	            		
	            	}catch(Exception argException){
	            		System.out.println("3: " + argException.getMessage());
	            	}
	            }
				
			}
		});

		menuItem3.addActionListener(new ActionListener() {
			@Override
			public void actionPerformed(ActionEvent e) {
				
			}
		});

				setVisible(true);
	}
	
	class InputOutput{
		
		InputOutput(boolean bool, String fileName){
			if(bool){
				try {
					FileOutputStream fOut = new FileOutputStream(fileName);
					ObjectOutputStream oos = new ObjectOutputStream(fOut);
					oos.writeObject(vc);
					
					/*//��Ʈ�� �ȿ� �����ִ� �����͸� ������ �������� ����
					oos.flush();
					*/
					fOut.close();
					oos.close();
				} catch (Exception e1) {
					// TODO Auto-generated catch block
					e1.printStackTrace();
				}
			}else{
				
				FileInputStream fIn;
				ObjectInputStream oIs;
				try {
					fIn = new FileInputStream(fileName);
					oIs = new ObjectInputStream(fIn);
					vc = (Vector<Shape>) oIs.readObject();
					repaint();
					fIn.close();
					oIs.close();
				} catch (Exception e1) {
					// TODO Auto-generated catch block
					e1.printStackTrace();
				}
			}
		}
	}
}

public class GUI_Grow {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		MyFrame f = new MyFrame();
	}

}
