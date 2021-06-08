#include <bits/stdc++.h>
using namespace std;

int main()
{
    int n;
    int a, b;
    cin >> n;
    int count = -1;
    for(int i=0; i < n; i++){
        cin >> a >> b;
        int c;
        if(a != b) count+=2;
        else if(count == -1 && i > 0 && c<a) count = 0;
                // cout << c << " " << a << endl;

        c = b;
    }
    if(count > 0) cout << "rated\n";
    if(count == 0) cout << "unrated\n";
    if(count == -1) cout << "maybe\n";
    
}