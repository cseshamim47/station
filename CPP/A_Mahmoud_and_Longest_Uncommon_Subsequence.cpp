#include <bits/stdc++.h>
using namespace std;

void printIndex(string text , string pat){
    int found = text.find(pat);
    while(found != string::npos){
        cout << "Pattern found at index : " << found << endl;

        found = text.find(pat, found+1);
    }
    cout << found << endl;
}

int main()
{
    string pat,text;
    cin >> pat >> text; 

    if(pat==text) cout << -1 << "\n";
    else cout << max(pat.length(),text.size()) << "\n";
}

/* 
abcdacabcd
ab
Pattern found at index : 0
Pattern found at index : 6
-1 */