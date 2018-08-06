/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package view;

import controller.CategoriaDAO;
import javax.swing.JOptionPane;
import model.Categoria;

/**
 *
 * @author assparremberger
 */
public class FrmCategoria extends javax.swing.JInternalFrame {

    /**
     * Creates new form FrmCidade
     */
    private Categoria categoria;
    
    public ListCategorias telaListCategorias;
    
    public FrmCategoria() {
        initComponents();
    }
    
    public FrmCategoria(Categoria cat) {
        initComponents();
        categoria = cat;
        carregarFormulario();
    }
   
    private void carregarFormulario(){
        lblCodigo.setText( String.valueOf(categoria.getId()) );
        txtNome.setText( categoria.getNome() );
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jLabel1 = new javax.swing.JLabel();
        lblCodigo = new javax.swing.JLabel();
        jLabel3 = new javax.swing.JLabel();
        txtNome = new javax.swing.JTextField();
        btnSalvar = new javax.swing.JButton();
        btnLimpar = new javax.swing.JButton();

        setClosable(true);
        setIconifiable(true);
        setTitle("Formulário de Categoria");
        setMinimumSize(new java.awt.Dimension(400, 300));
        setPreferredSize(new java.awt.Dimension(400, 300));

        jLabel1.setText("Código: ");

        lblCodigo.setText("____");

        jLabel3.setText("Nome:");

        btnSalvar.setFont(new java.awt.Font("Tahoma", 0, 24)); // NOI18N
        btnSalvar.setText("Salvar");
        btnSalvar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnSalvarActionPerformed(evt);
            }
        });

        btnLimpar.setFont(new java.awt.Font("Tahoma", 0, 24)); // NOI18N
        btnLimpar.setText("Limpar");
        btnLimpar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnLimparActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGap(20, 20, 20)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(jLabel1)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(lblCodigo))
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(jLabel3)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(layout.createSequentialGroup()
                                .addComponent(btnSalvar)
                                .addGap(65, 65, 65)
                                .addComponent(btnLimpar))
                            .addComponent(txtNome, javax.swing.GroupLayout.PREFERRED_SIZE, 309, javax.swing.GroupLayout.PREFERRED_SIZE))))
                .addContainerGap(24, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel1)
                    .addComponent(lblCodigo))
                .addGap(29, 29, 29)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel3)
                    .addComponent(txtNome, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(63, 63, 63)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(btnSalvar)
                    .addComponent(btnLimpar))
                .addContainerGap(104, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void btnSalvarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnSalvarActionPerformed
        String nome = txtNome.getText();
        
        if( ! nome.isEmpty() ){
            boolean nova = false;
            
            if( categoria == null ){
                nova = true;
                categoria = new Categoria();
            }
            
            categoria.setNome( nome );
            
            CategoriaDAO dao = new CategoriaDAO();
            if( nova ){
                dao.inserir(categoria);
                txtNome.setText("");
            }else{
                dao.editar(categoria);
                telaListCategorias.carregarTabela();
                this.dispose();
            }
                
        }else{
            JOptionPane.showMessageDialog(this, 
                    "O nome da categoria deve ser informado!");
        }
    }//GEN-LAST:event_btnSalvarActionPerformed

    private void btnLimparActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnLimparActionPerformed
        limpar();
    }//GEN-LAST:event_btnLimparActionPerformed

     private void limpar() {
        txtNome.setText("");
     }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btnLimpar;
    private javax.swing.JButton btnSalvar;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel lblCodigo;
    private javax.swing.JTextField txtNome;
    // End of variables declaration//GEN-END:variables
}