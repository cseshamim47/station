#include <bits/stdc++.h>
using namespace std;

int main()
{
    int n;
    cin >> n;
    int count = 0;
    string str;
    while(n--){
        cin >> str;
        if(str[0] == 'T') count += 4;  
        if(str[0] == 'C') count += 6;  
        if(str[0] == 'O') count += 8;  
        if(str[0] == 'D') count += 12;  
        if(str[0] == 'I') count += 20;  
    }
    cout << count << endl;
    
}

// Tetrahedron. Tetrahedron has 4 triangular faces.
// Cube. Cube has 6 square faces.
// Octahedron. Octahedron has 8 triangular faces.
// Dodecahedron. Dodecahedron has 12 pentagonal faces.
// Icosahedron. Icosahedron has 20 triangular faces.