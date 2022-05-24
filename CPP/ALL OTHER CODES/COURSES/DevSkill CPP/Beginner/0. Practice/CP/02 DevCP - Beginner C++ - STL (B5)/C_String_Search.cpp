#include <bits/stdc++.h>
using namespace std;
// void findPat(string &T,string &P){
    
// }
int main()
{
    string T;
    string P;
    cin >> T >> P;
    // findPat(T,P);
    int found = T.find(P);
    while(found != string::npos){
        cout << found << endl;
        found = T.find(P,found+1);
    }
}