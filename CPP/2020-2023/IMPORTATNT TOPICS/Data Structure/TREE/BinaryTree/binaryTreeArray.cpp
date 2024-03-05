#include <bits/stdc++.h>
using namespace std;
vector<int>bt;
void insert(int n){
    bt.push_back(n);
}
void show(){
    for(auto x : bt) cout << x << " ";
    cout << endl;
}
void root(int n){
    cout << bt[n/2] << endl;
}
void leftChild(int n){
    cout << bt[2*n] << endl;
}
void rightChild(int n){
    cout << bt[2*n + 1] << endl;
}
void height(){
    cout << (int)log2(bt.size()+1) << endl;
}
int main()
{
    bt.push_back(INT_MIN/2);
    
    insert(1);
    insert(2);
    insert(3);
    insert(4);
    insert(5);
    insert(6);
    insert(7);

    show();
    root(3);
    leftChild(3);
    rightChild(3);
    height();
    
    
}