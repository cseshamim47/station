#include <bits/stdc++.h>
using namespace std;

int main()
{
    string p = "WUB";
    string str;
    cin >> str;
    int found = str.find(p);
    if(found != 0) cout << str.substr(0,found) << " ";
    // string sstr = str.substr(found+3, str.find(found+1));
    int next = str.find(p,found+1);

    while (found != string::npos)
    {
        int range = next - (found+3);
        if(range != 0)
        cout << str.substr(found+3,range) << " ";
        // getchar();
        found = next;
        next = str.find(p,found+1);
    }
    

    // cout << next << " " << found << endl;
    // int range = next - (found+3);
    // // cout << range << endl;
    // cout << str.substr(found+3,range) << " ";
    // found = next;
    // next = str.find(p,found+1);
    // range = next - (found+3);
    // cout << str.substr(found+3,range);

    
}