#include <bits/stdc++.h>
using namespace std;

int main()
{
    string p = "WUB";
    string str = "WUBIWUBAM";
    int found = str.find("WUB");
    // string sstr = str.substr(found+3, str.find(found+1));
    int next = str.find(p,found+1);
    cout << next << " " << found << endl;
    int range = next - found+3;
    cout << range << endl;
    cout << str.substr(found+3,range);
    
}